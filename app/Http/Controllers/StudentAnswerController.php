<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseAnswer;
use App\Models\CourseQuestion;
use App\Models\StudentAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class StudentAnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

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
            $selectedAnswer = CourseAnswer::find($validated['answer_id']);

            $existingAnswer = StudentAnswer::where('user_id', Auth::id())
                ->where('course_question_id', $question->id)
                ->first();

            if ($existingAnswer) {
                return redirect()->back()->withErrors(['answer_id' => 'Anda sudah menjawab pertanyaan ini!'])->withInput();
            }

            $answerValue = $selectedAnswer->is_correct ? 'correct' : 'wrong';

            StudentAnswer::create([
                'user_id' => Auth::id(),
                'course_question_id' => $question->id,
                'answer' => $answerValue
            ]);

            DB::commit();

            $nextQuestion = CourseQuestion::where('course_id', $course->id)
                ->where('id', '>', $question->id)
                ->orderBy('id', 'ASC')
                ->first();

            if ($nextQuestion) {
                return redirect()->route('dashboard.learning.course', ['course' => $course, 'question' => $nextQuestion]);
            } else {
                return redirect()->route('dashboard.learning.finished.course', $course);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            throw ValidationException::withMessages([
                'system_error' => ['System Error: Gagal menyimpan jawaban! ' . $e->getMessage()],
            ]);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(StudentAnswer $studentAnswer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StudentAnswer $studentAnswer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StudentAnswer $studentAnswer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudentAnswer $studentAnswer)
    {
        //
    }
}
