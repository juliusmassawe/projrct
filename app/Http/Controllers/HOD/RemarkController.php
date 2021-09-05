<?php

namespace App\Http\Controllers\HOD;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\HOD\Remark;
use Illuminate\Http\Request;

class RemarkController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'remarks' => 'required'
        ]);

        $course = Course::findOrFail($request->course_id);

        $course->remarks()->create([
            'role_id' => auth()->user()->role_id,
            'remarks' => $request->remarks,
            'academic_year' => $this->current_academic_year(),
        ]);

        return back()->with('success', 'Remarks submitted');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HOD\Remark  $remark
     * @return \Illuminate\Http\Response
     */
    public function show(Remark $remark)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HOD\Remark  $remark
     * @return \Illuminate\Http\Response
     */
    public function edit(Remark $remark)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HOD\Remark  $remark
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Remark $remark)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HOD\Remark  $remark
     * @return \Illuminate\Http\Response
     */
    public function destroy(Remark $remark)
    {
        //
    }
}
