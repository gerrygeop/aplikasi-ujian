<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseQuestion;
use App\Models\StudentAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LearningController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $courses = $user->courses()
            ->with(['category', 'questions'])
            ->withCount('questions')
            ->orderBy('id', 'DESC')
            ->get();

        $answeredQuestionIds = StudentAnswer::where('user_id', $user->id)
            ->distinct()
            ->pluck('course_question_id')
            ->toArray();

        foreach ($courses as $course) {
            $totalQuestions = $course->questions_count;

            $totalAnsweredQuestionsForCourse = CourseQuestion::where('course_id', $course->id)
                ->whereIn('id', $answeredQuestionIds)
                ->count();

            $course->nextQuestion = null;

            if ($totalAnsweredQuestionsForCourse < $totalQuestions) {
                $firstUnansweredQuestion = CourseQuestion::where('course_id', $course->id)
                    ->whereNotIn('id', $answeredQuestionIds)
                    ->orderBy('id', 'ASC')
                    ->first();

                $course->nextQuestion = $firstUnansweredQuestion ? $firstUnansweredQuestion->id : null;
            }
        }

        return view('student.courses.index', [
            'courses' => $courses
        ]);
    }

    public function learning(Course $course, CourseQuestion $question)
    {
        $user = Auth::user();

        $isEnrolled = $user->courses()->where('course_id', $course->id)->exists();
        abort_if(!$isEnrolled, 403, 'Anda tidak terdaftar pada kelas ini');

        if ($question->course_id !== $course->id) {
            abort(404, 'Pertanyaan tidak ditemukan dalam kursus ini.');
        }

        $question->load('answers');
        $course->load('category');

        return view('student.courses.learning', [
            'course' => $course,
            'question' => $question
        ]);
    }

    public function learning_finished(Course $course)
    {
        $course->load(['category']);

        return view('student.courses.learning_finished', [
            'course' => $course
        ]);
    }

    public function learning_raport(Course $course)
    {
        $course->load('category');

        $studentAnswers = StudentAnswer::with('question')
            ->whereHas('question', function ($query) use ($course) {
                $query->where('course_id', $course->id);
            })->where('user_id', auth()->id())->get();

        $totalQuestions = CourseQuestion::where('course_id', $course->id)->count();
        $totalCorrectAnswers = $studentAnswers->where('answer', 'correct')->count();

        $passingPercentage = 0.60; // 60% sebagai desimal
        if ($totalQuestions > 0) {
            $percentageCorrect = ($totalCorrectAnswers / $totalQuestions); // Menghitung persentase dalam bentuk desimal
            $passed = $percentageCorrect >= $passingPercentage; // User lolos jika persentase benar >= 60%
        } else {
            $passed = false;
        }

        return view('student.courses.learning_raport', [
            'course' => $course,
            'studentAnswers' => $studentAnswers,
            'totalQuestions' => $totalQuestions,
            'totalCorrectAnswers' => $totalCorrectAnswers,
            'passed' => $passed,
        ]);
    }
}
