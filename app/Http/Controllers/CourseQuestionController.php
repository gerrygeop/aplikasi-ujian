<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class CourseQuestionController extends Controller
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
    public function create(Course $course)
    {
        $course->load(['category', 'students']);

        return view('admin.questions.create', [
            'course' => $course
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Course $course)
    {
        $validated = $request->validate([
            'question' => ['required', 'string', 'max:255'],
            'answers' => ['required', 'array'],
            'answers.*' => ['required', 'string'],
            'correct_answer' => ['required', 'integer']
        ]);

        DB::beginTransaction();

        try {
            $question = $course->questions()->create([
                'question' => $validated['question']
            ]);

            foreach ($validated['answers'] as $index => $answerText) {
                $isCorrect = ($validated['correct_answer'] == $index);
                $question->answers()->create([
                    'answer' => $answerText,
                    'is_correct' => $isCorrect
                ]);
            }

            DB::commit();

            return redirect()->route('dashboard.courses.show', $course);
        } catch (\Exception $e) {
            DB::rollBack();
            $error = ValidationException::withMessages([
                'system_error' => ['Gagal Input Question/Answer: ' . $e->getMessage()]
            ]);

            throw $error;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(CourseQuestion $courseQuestion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CourseQuestion $courseQuestion)
    {
        $courseQuestion->load('answers');

        return view('admin.questions.edit', [
            'courseQuestion' => $courseQuestion,
            'course' => $courseQuestion->course
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CourseQuestion $courseQuestion)
    {
        $validated = $request->validate([
            'question' => ['required', 'string', 'max:255'],
            'answers' => ['required', 'array'],
            'answers.*' => ['required', 'string'],
            'correct_answer' => ['required', 'integer']
        ]);

        DB::beginTransaction();

        try {
            $courseQuestion->update([
                'question' => $validated['question']
            ]);

            $courseQuestion->answers()->delete();

            foreach ($validated['answers'] as $index => $answerText) {
                $isCorrect = ($validated['correct_answer'] == $index);
                $courseQuestion->answers()->create([
                    'answer' => $answerText,
                    'is_correct' => $isCorrect
                ]);
            }

            DB::commit();

            return redirect()->route('dashboard.courses.show', $courseQuestion->course);
        } catch (\Exception $e) {
            DB::rollBack();
            $error = ValidationException::withMessages([
                'system_error' => ['Gagal Input Question/Answer: ' . $e->getMessage()]
            ]);

            throw $error;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CourseQuestion $courseQuestion)
    {
        DB::beginTransaction();

        try {
            $courseQuestion->delete();
            DB::commit();

            return redirect()->route('dashboard.courses.show', $courseQuestion->course);
        } catch (\Exception $e) {
            DB::rollBack();
            $error = ValidationException::withMessages([
                'system_error' => ['Gagal Delete: ' . $e->getMessage()]
            ]);

            throw $error;
        }
    }
}
