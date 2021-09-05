<?php

namespace App\Http\Controllers\HOD;

use App\Http\Controllers\Controller;
use App\Models\Admin\HeadOfDepartment;
use App\Models\Course;
use App\Models\Programme;
use App\Models\Student\StudentEvaluation;
use Illuminate\Http\Request;

class HODController extends Controller
{

    public function index()
    {
        $department = auth()->user()->head_of_department->department_id;
        $programmes = Programme::where('department_id', $department)->get();
//        $evaluations = StudentEvaluation::whereIn('course_id', Course::whereIn('programme_id', $programmes->pluck('id')->toArray())->pluck('id')->toArray())->get();
        foreach ($programmes as $programme) {
//            $array = [1,2,3];
            $evaluations[$programme->id][$programme->id] = StudentEvaluation::whereIn('course_id', Course::where('programme_id', $programme->id)->where('year', $programme->id)->pluck('id'))->where('academic_year', $this->current_academic_year())->get();
        }
        $p_id = $year =3;
        $courses[$p_id][$year] = Course::where('programme_id', $p_id)->where('year', $year)->get();
//        dd($evaluations[1][1]);

        return view('hod.index', compact('programmes', 'evaluations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\HeadOfDepartment  $headOfDepartment
     * @return \Illuminate\Http\Response
     */
    public function show(HeadOfDepartment $headOfDepartment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\HeadOfDepartment  $headOfDepartment
     * @return \Illuminate\Http\Response
     */
    public function edit(HeadOfDepartment $headOfDepartment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\HeadOfDepartment  $headOfDepartment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HeadOfDepartment $headOfDepartment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\HeadOfDepartment  $headOfDepartment
     * @return \Illuminate\Http\Response
     */
    public function destroy(HeadOfDepartment $headOfDepartment)
    {
        //
    }
}
