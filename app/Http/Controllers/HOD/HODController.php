<?php

namespace App\Http\Controllers\HOD;

use App\Http\Controllers\Controller;
use App\Models\Admin\HeadOfDepartment;
use Illuminate\Http\Request;

class HODController extends Controller
{

    public function index()
    {
        return view('hod.index');
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
