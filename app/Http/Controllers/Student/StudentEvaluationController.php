<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Student\Student;
use App\Models\Student\StudentEvaluation;
use Illuminate\Http\Request;

class StudentEvaluationController extends Controller
{

    public function index()
    {
        //
    }

    public function store(Request $request)
    {
        $student = auth()->user()->student;

        if ($student->evaluation->where('course_id', $request->course_id)->first()){
            return back()->with('fail', 'You have already evaluated this course');
        }

        $data = $request->validate([
            'course_id'=>'',
            'academic_year' => '',
            'class_test'=>'required',
            'assignment'=>'required',
            'correction'=>'required',
            'test_returned'=>'required',
            'understanding'=>'required',
            'material_available'=>'required',
            'well_organized'=>'required',
            'recommend'=>'required',
            'meet_expectations'=>'required',
            'helpful'=>'required',
        ]);

        $student->evaluation()->create($data);

        return redirect()->route('student.courses.index')->with('success', 'Course Evaluated Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student\StudentEvaluation  $studentEvaluation
     * @return \Illuminate\Http\Response
     */
    public function show(StudentEvaluation $studentEvaluation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student\StudentEvaluation  $studentEvaluation
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentEvaluation $studentEvaluation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student\StudentEvaluation  $studentEvaluation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudentEvaluation $studentEvaluation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student\StudentEvaluation  $studentEvaluation
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentEvaluation $studentEvaluation)
    {
        //
    }
}
