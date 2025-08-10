<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseAnswer;
use App\Models\CourseQuestion;
use App\Models\StudentAnswer;
use App\Models\StudentResults;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class StudentAnswerController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Course $course, CourseQuestion $question)
    {
        $validated = $request->validate([
            'answer_id' => [
                'required',
                // Pastikan answer_id ada di tabel course_answers
                // DAN pastikan course_question_id dari jawaban tersebut cocok dengan $question->id
                'exists:course_answers,id',
                function ($attribute, $value, $fail) use ($question) {
                    $answer = CourseAnswer::find($value);
                    if (!$answer || $answer->course_question_id !== $question->id) {
                        $fail('Jawaban yang dipilih tidak valid untuk pertanyaan ini.');
                    }
                },
            ],
        ]);

        DB::beginTransaction();

        try {
            $selectedAnswer = CourseAnswer::findOrFail($validated['answer_id']);

            $existingAnswer = StudentAnswer::where('user_id', auth()->id())
                ->where('course_question_id', $question->id)
                ->first();

            if ($existingAnswer) {
                return redirect()->back()->withErrors(['answer_id' => 'Anda sudah menjawab pertanyaan ini!'])->withInput();
            }

            StudentAnswer::create([
                'user_id' => auth()->id(),
                'course_question_id' => $question->id,
                'answer' => $selectedAnswer->is_correct ? 'correct' : 'wrong'
            ]);

            DB::commit();

            $nextQuestion = CourseQuestion::where('course_id', $course->id)
                ->where('id', '>', $question->id)
                ->orderBy('id', 'ASC')
                ->first();

            if ($nextQuestion) {
                return redirect()->route('dashboard.learning.course', [
                    'course' => $course,
                    'question' => $nextQuestion
                ]);
            } else {
                // return redirect()->route('dashboard.learning.finished.course', $course);
                return $this->processFinalResult($course);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error("Gagal menyimpan jawaban user " . auth()->id() . ": " . $e->getMessage());

            $error = ValidationException::withMessages([
                'system_error' => ['System Error: Gagal menyimpan jawaban! ' . $e->getMessage()],
            ]);
            dd($error);
            throw $error;
        }
    }

    /**
     * Proses hitung nilai dan simpan hasil akhir ke tabel student_results.
     * Ini dipanggil hanya setelah user menyelesaikan semua soal.
     *
     * @param Course $course
     * @return \Illuminate\Http\RedirectResponse
     * @throws ValidationException
     */
    private function processFinalResult(Course $course)
    {
        $userId = auth()->id();

        // 1. Dapatkan total pertanyaan dan total jawaban yang diberikan user
        $totalQuestions = $course->questions()->count();
        $totalUserAnswers = StudentAnswer::where('user_id', $userId)
            ->whereIn('course_question_id', $course->questions()->pluck('id'))
            ->count();

        // 2. Hitung jumlah jawaban yang benar
        $correctAnswersCount = StudentAnswer::where('user_id', $userId)
            ->whereIn('course_question_id', $course->questions()->pluck('id'))
            ->where('answer', 'correct')
            ->count();

        // 3. Hitung persentase dan status lulus
        $passingPercentage = 0.60;
        $scorePercentage = ($totalQuestions > 0) ? ($correctAnswersCount / $totalQuestions) * 100 : 0;
        $isPassed = $scorePercentage >= ($passingPercentage * 100);

        // 4. Simpan hasil akhir ke tabel student_results
        DB::beginTransaction();
        try {
            StudentResults::updateOrCreate(
                [
                    'user_id' => $userId,
                    'course_id' => $course->id
                ],
                [
                    'total_questions' => $totalQuestions,
                    'total_answered' => $totalUserAnswers,
                    'total_correct' => $correctAnswersCount,
                    'score_percentage' => $scorePercentage,
                    'is_passed' => $isPassed,
                    'completed_at' => now()
                ]
            );

            DB::commit();

            // Redirect ke halaman selesai kursus
            return redirect()->route('dashboard.learning.finished.course', $course);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error("Gagal menyimpan hasil tes user " . $userId . ": " . $e->getMessage());

            $error = ValidationException::withMessages([
                'system_error' => ['Terjadi kesalahan sistem saat menyimpan hasil.']
            ]);
            dd($error->errors());
            throw $error; // Re-throw untuk penanganan lebih lanjut jika perlu
        }
    }
}
