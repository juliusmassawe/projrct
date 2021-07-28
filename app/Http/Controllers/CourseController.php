<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Programme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{

    public function index()
    {
        $courses = Course::where('department_id', auth()->user()->head_of_department->department_id)->get();

        return view('hod.schedule.index', compact('courses'));
    }


    public function create()
    {
        return view('hod.schedule.create');
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'department_id' => '',
            'name' => 'required',
            'ante' => 'required',
            'nature' => 'required',
            'credits' => 'required',
        ]);

        Course::create($data);

        return redirect()->route('schedule.index')->with('success', 'Course created successfully');


    }


    public function show(Course $course)
    {
        $programmes_with_course = DB::table('course_programme')->where('course_id', $course->id)->get();
        $programmes = Programme::where('department_id', auth()->user()->head_of_department->department_id)->get();
        return view('hod.schedule.show', compact('course', 'programmes', 'programmes_with_course'));
    }

    public function addCourseToProgramme(Request $request)
    {
        $data = $request->validate([
            'programme_id' => 'required',
            'semester' => 'required',
        ]);

        $course = Course::find($request->course_id);
        $course->programmes()->attach($data['programme_id'], ['semester' => $data['semester']]);

        return back()->with('success', 'Course successfully added to the programme');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        //
    }


    public function destroy(Course $course)
    {
        $course->delete();

        return back()->with('success', 'Course successfully deleted');
    }
}
