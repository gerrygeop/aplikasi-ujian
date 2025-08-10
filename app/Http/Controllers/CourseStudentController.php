<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseStudent;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class CourseStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Course $course)
    {
        $course->load(['category', 'students', 'results']);

        $students = $course->students->map(function ($student) use ($course) {
            $result = $course->results->firstWhere('user_id', $student->id);

            $student->result = $result;

            return $student;
        });

        return view('admin.students.index', [
            'course' => $course,
            'students' => $students,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Course $course)
    {
        $course->load(['category', 'students']);

        return view('admin.students.add_student', [
            'course' => $course
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Course $course)
    {
        $request->validate([
            'email' => 'required|string|email'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            $error = ValidationException::withMessages([
                'system_error' => ['Email student tidak ditemukan!']
            ]);

            throw $error;
        }

        $isEnrolled = $course->students()->where('user_id', $user->id)->exists();

        if ($isEnrolled) {
            $error = ValidationException::withMessages([
                'system_error' => ['Student sudah memiliki hak akses kelas!'],
            ]);
            throw $error;
        }

        DB::beginTransaction();

        try {
            $course->students()->attach($user->id);

            DB::commit();

            return redirect()->route('dashboard.courses.course_student.index', $course);
        } catch (\Exception $e) {
            DB::rollBack();

            $error = ValidationException::withMessages([
                'system_error' => ['System Error: Gagal menambahkan Student! ' . $e->getMessage()],
            ]);

            throw $error;
        }
    }
}
