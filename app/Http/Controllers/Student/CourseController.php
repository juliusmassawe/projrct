<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Student\Student;
use Illuminate\Http\Request;

class CourseController extends Controller
{

    public function index()
    {
        $student = auth()->user()->student;

        $core_courses = Course::where('programme_id', auth()->user()->student->programme_id)
            ->where('semester', $this->current_semester())
            ->where('year', $this->current_student_year())
            ->where('nature', 'Core')
            ->get();

        $elective = $student->electives->first();

        return view('student.courses.index', compact('core_courses', 'elective', 'student'));
    }

    public function show(Course $course)
    {
        $student = auth()->user()->student;

        if($student->programme != $course->programme){
            abort(403);
        }

        return view('student.courses.show', compact('course', 'student'));
    }
}

