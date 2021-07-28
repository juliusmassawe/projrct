<?php

namespace App\Http\Controllers\DVCA;

use App\Http\Controllers\Controller;
use App\Models\Admin\Level;
use App\Models\DVCA\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{

    public function index()
    {
        $events = Schedule::all();
        return view('dvca.schedule.index', compact('events'));
    }

    public function create()
    {
        $levels = Level::all();

        return view('dvca.schedule.create', compact('levels'));
    }


    public function store(Request $request)
    {

        $data = $request->validate([
            'event' => 'required',
            'levels' => 'required',
            'semester' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        foreach($data['levels'] as $level){
            $schedule = new Schedule();
            $schedule->year = $this->current_academic_year();
            $schedule->event = $data['event'];
            $schedule->level_id = $level;
            $schedule->semester = $data['semester'];
            $schedule->start_date = $data['start_date'];
            $schedule->end_date = $data['end_date'];
            $schedule->save();
        }

        return redirect()->route('dvca.schedule.index')->with('success', 'Event Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DVCA\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function show(Schedule $schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DVCA\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function edit(Schedule $schedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DVCA\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Schedule $schedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DVCA\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Schedule $schedule)
    {
        //
    }
}
