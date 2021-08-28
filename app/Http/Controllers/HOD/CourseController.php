<?php

namespace App\Http\Controllers\HOD;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lecturer\Lecturer;
use App\Models\Programme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function show(Course $course)
    {
        $lecturers = Lecturer::where('department_id', auth()->user()->head_of_department->department_id)->get();

        return view('hod.courses.show', compact('course', 'lecturers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        //
    }


    public function update(Request $request, Course $course)
    {

        $request->validate(['lecturer_id' => 'required', ['lecturer_id.required'=>'Please select a lecturer to assign this course']]);

        $course->lecturers()->attach($request->lecturer_id, ['academic_year' => session()->get('academic_year')]);

        return back()->with('success', 'Lecturer assigned');
    }


    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()->route('hod.programmes.index')->with('success', 'Course successfully deleted');
    }
}
