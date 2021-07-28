<?php

namespace App\Http\Controllers\HOD;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Programme;
use Illuminate\Http\Request;
use App\Models\Admin\Department;
use App\Models\Admin\Level;

class ProgrammeController extends Controller
{

    public function index()
    {
        $programmes = Programme::where('department_id', auth()->user()->head_of_department->department_id)->get();

        return view('hod.programmes.index', compact('programmes'));
    }

    public function create()
    {
        $departments = Department::all();
        $levels = Level::all();

        return view('hod.programmes.create', compact('departments', 'levels'));
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'abbreviation' => 'required',
            'department_id' => '',
            'level_id' => 'required',
            'no_of_semesters' => 'required|int',
            ],
            [
                'level_id.required' => 'Please select the level which the programme belongs to',
                'no_of_semesters.required' => 'Please enter the number of semesters it takes to complete the programme',
                'no_of_semesters.int' => 'Number of semesters must be a number',
            ]
        );

        Programme::create($data);

        return redirect()->route('programmes.index')->with('success', 'Programme added successfully');

    }

    public function show(Programme $programme)
    {
        $courses = Course::where('programme_id', $programme->id)->get();
        return view('hod.programmes.show', compact('programme', 'courses'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Programme  $programme
     * @return \Illuminate\Http\Response
     */
    public function edit(Programme $programme)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Programme  $programme
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Programme $programme)
    {
        //
    }


    public function destroy(Programme $programme)
    {
        $programme->delete();

        return back()->with('success', "Programme deleted");
    }
}
