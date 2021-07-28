<?php

namespace App\Http\Controllers\Lecturer;

use App\Http\Controllers\Controller;
use App\Models\Lecturer\LecturerEvaluation;
use Illuminate\Http\Request;

class LecturerEvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    public function store(Request $request)
    {
        $lecturer = auth()->user()->lecturer;

        if ($lecturer->evaluations->where('course_id', $request->course_id)->first()){
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

        $lecturer->evaluations()->create($data);

        return redirect()->route('lecturer.courses.index')->with('success', 'Course Evaluated Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lecturer\LecturerEvaluation  $lecturerEvaluation
     * @return \Illuminate\Http\Response
     */
    public function show(LecturerEvaluation $lecturerEvaluation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lecturer\LecturerEvaluation  $lecturerEvaluation
     * @return \Illuminate\Http\Response
     */
    public function edit(LecturerEvaluation $lecturerEvaluation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lecturer\LecturerEvaluation  $lecturerEvaluation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LecturerEvaluation $lecturerEvaluation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lecturer\LecturerEvaluation  $lecturerEvaluation
     * @return \Illuminate\Http\Response
     */
    public function destroy(LecturerEvaluation $lecturerEvaluation)
    {
        //
    }
}
