<?php

namespace App\Http\Controllers\DVCA;

use App\Http\Controllers\Controller;
use App\Models\DVCA\DVCA;
use Illuminate\Http\Request;

class DVCAController extends Controller
{

    public function index()
    {
        return view('dvca.index');
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
     * @param  \App\Models\DVCA\DVCA  $dVCA
     * @return \Illuminate\Http\Response
     */
    public function show(DVCA $dVCA)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DVCA\DVCA  $dVCA
     * @return \Illuminate\Http\Response
     */
    public function edit(DVCA $dVCA)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DVCA\DVCA  $dVCA
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DVCA $dVCA)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DVCA\DVCA  $dVCA
     * @return \Illuminate\Http\Response
     */
    public function destroy(DVCA $dVCA)
    {
        //
    }
}
