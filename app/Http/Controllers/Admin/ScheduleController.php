<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\schedule;
use App\Models\station;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schedule = Schedule::all();
        return view('Admin.schedule.index', ['schedule' => $schedule]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stations = station::all();
        return view('Admin.schedule.create', ['stations' => $stations]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, schedule $schedule)
    {
        $request->validate([
            'schedulename' => ['required'],

        ]);
        $schedule->EnabledEvent = $request->EnabledEvent;
        $schedule->UseDate = $request->UseDate;
        $schedule->AdditionalTime = $request->AdditionalTime;
        $schedule->EveryYear	= $request->EveryYear;
        $schedule->FileName = $request->FileName;
        $schedule->DelPrev = $request->DelPrev;
        $schedule->DoNotRunIfStopped = $request->DoNotRunIfStopped;
        $schedule->bRepeat = $request->bRepeat;
        $schedule->nRepeatPer = $request->nRepeatPer;
        $schedule->nRepeat = $request->nRepeat;
        $schedule->RepeatLimit = $request->RepeatLimit;
        $schedule->Shuffle = $request->Shuffle;
        $schedule->PausePlaylist = $request->PausePlaylist;
        $schedule->UseWeeks = $request->UseWeeks;
        $schedule->Enqueue = $request->Enqueue;
        $schedule->DelTaskAction = $request->DelTaskAction;
        $schedule->DelTaskUseDate = $request->DelTaskUseDate;
        $schedule->TaskName = $request->TaskName;
        $schedule->ClearMainPlaylist = $request->ClearMainPlaylist;
        $schedule->AddToPlaylistEnd = $request->AddToPlaylistEnd;
        $schedule->UseDaysOfWeek = $request->UseDaysOfWeek;
        $schedule->Hours = $request->Hours;
        $schedule->Minutes = $request->Minutes;
        $schedule->Seconds = $request->Seconds;
        $schedule->TimeType = $request->TimeType;
        $schedule->TaskNameAsTitle = $request->TaskNameAsTitle;
        $schedule->Days = $request->Days;
        $schedule->Weeks = $request->Weeks;
        $schedule->DelTaskTime = $request->DelTaskTime;

        
        $schedule->save();

        return redirect('admin/schedule');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
