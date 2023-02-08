<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\schedule;
use App\Models\station;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ScheduleShow(Request $request)
    {
        $station_id = $request->station_id;

       // dd($station_id);

        $station = station::where('id',$station_id)->get(['station_ip','password']);
        
        $ip_address = $station[0]['station_ip'];

        $password = $station[0]['password'];

       // dd($ip_address,$password);

          $schedule = Schedule::all();
       // return view('Admin.schedule.index', ['schedule' => $schedule]);
       $xmlString = file_get_contents(url('http://'.$ip_address.':9000/?pass='.$password.'&action=schedule&type=list'));
       $xmlObject = simplexml_load_string($xmlString);
                   
        $json = json_encode($xmlObject);
        $phpArray = json_decode($json, true); 
        
        //$data = $phpArray->where('EnabledEvent', 'False');
        //dd($data);
        //dd($schedule);
        //dd($phpArray['item'][0]['@attributes']['FileName']);
        return view('Admin.schedule.index', ['phpArray' => $phpArray['item']]); 
    }

    public function index()
    {
        $arr['stations'] = station::all();
       // $arr['bank'] = Accounts::where('acc_trans_type_id', 3)->get();
       // $arr['company'] = company::where('status', 'Active')->get();
        return view('admin.schedule.search')->with($arr);

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
          //  'schedulename' => ['required'],

        ]);
        $filepath = Storage::path($request->FileName); 

        //dd($filepath);

        $schedule->station_id = $request->station_id;
        $schedule->EnabledEvent = $request->EnabledEvent;
        $schedule->UseDate = $request->UseDate;
        $schedule->AdditionalTime = $request->AdditionalTime;
        $schedule->EveryYear	= $request->EveryYear;
        $schedule->FileName = $filepath;
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

    public function getSchedule(Request $request)
    {
        $p=Schedule::where(['id'=>1])->first()->toArray();

      /* // dd($p);

        $result ="";
        $arrayKeys = array_keys($p);
      //  dd($arrayKeys);
    for ($i = 0; $i < count($arrayKeys); $i++) {

       $result .= $arrayKeys[$i] . '=' . '"' . $p[$arrayKeys[$i]]. '"'.' ';
       //$result .= "{$arrayKeys[$i]}";
    } */

    $Password = "Christian7";
    $ipaddress = "127.0.0.1:9000";

    //$filepath = Storage::path($request->FileName); 

    ///dd($filepath);

    $Sun = $request->h0;
    //dd($Sun);
    $station_id = $request->station_id;
    $Time = "2023-01-30 05:00:00";
    $EnabledEvent = $request->EnabledEvent;
   // dd($EnabledEvent);
    $UseDate = $request->UseDate;
    $AdditionalTime = $request->AdditionalTime;
    $EveryYear	= $request->EveryYear;
   // $FileName = $filepath;
    $DelPrev = $request->DelPrev;
    $DoNotRunIfStopped = $request->DoNotRunIfStopped;
    $bRepeat = $request->bRepeat;
    $nRepeatPer = $request->nRepeatPer;
    $nRepeat = $request->nRepeat;
    $RepeatLimit = $request->RepeatLimit;
    $Shuffle = $request->Shuffle;
    $PausePlaylist = $request->PausePlaylist;
    $UseWeeks = $request->UseWeeks;
    $Enqueue = $request->Enqueue;
    $DelTaskAction = $request->DelTaskAction;
    $DelTaskUseDate = $request->DelTaskUseDate;
    $TaskName = $request->TaskName;
    $ClearMainPlaylist = $request->ClearMainPlaylist;
    $AddToPlaylistEnd = $request->AddToPlaylistEnd;
    $UseDaysOfWeek = $request->UseDaysOfWeek;
    $Hours = $request->Hours;
    $Minutes = $request->Minutes;
    $Seconds = $request->Seconds;
    $TimeType = $request->TimeType;
    $TaskNameAsTitle = $request->TaskNameAsTitle;
    $Days = $request->Days;
    $Weeks = $request->Weeks;
    $DelTaskTime = "2023-01-31 00:00:00";
      
     // $value = '<item EnabledEvent=' . '"' . $EnabledEvent . '"' . ' UseDate=' . '"' . $UseDate . '"' . ' AdditionalTime=' . '"' . $AdditionalTime . '"' . ' EveryYear=' . '"' . $EveryYear . '"' . ' Imm="False" Above="False" FileName="C:\Users\CHRIS\Downloads\Kizz_Daniel_-_Rich_Till_I_Die_RTID_.mp3" MuteLev="50" DelPrev=' . '"' . $DelPrev . '"' . ' DoNotRunIfStopped=' . '"' . $DoNotRunIfStopped . '"' . ' bRepeat=' . '"' . $bRepeat . '"' . ' nRepeatPer="10" DoNotMarkAsScheduled="False" nRepeat="1" RepeatLimit="False" Shuffle=' . '"' . $Shuffle . '"' . ' PausePlaylist="False" UseWeeks=' . '"' . $UseWeeks . '"' . ' Enqueue=' . '"' . $Enqueue . '"' . ' DelTaskAction=' . '"' . $DelTaskAction . '"' . ' DelTaskUseDate=' . '"' . $DelTaskUseDate . '"' . ' DelTaskEveryYear="False" TaskName="" ClearMainPlaylist="False" AddToPlaylistEnd="False" UseDaysOfWeek="True" Hours="" Minutes="" Seconds="" IsDurationLimit="False" DurationLimit="0" TimeType="0" TaskNameAsTitle="False" ItemImageIndex="11" FontColor="15395562" BackColor="1644825" GroupName="" OverrideRelay="False" DTMFOn="False" DTMFString="" DTMFOnly="False" DTMFExitOn="False" DTMFExitString="" MaxTimeWaitOn="False" MaxTimeWaitSec="0" MaxTimeWaitAction="0" TimeToStart="" NextRunStr="" IntTimeToStart="2147483647" WasStartedLast="True" ManualStart="0" UseFillers="False" FillersSource="" FillersRecurse="True" FillerMaxAmount="120" FillerAllowMax="False" Id="NUUMIPQNNHFJBRRWMEKD" Days="1101111" Weeks="11110" Time="2023-01-28 05:00:00" DelTaskTime="2023-01-31 00:00:00"/>';
      
      $value = '<item EnabledEvent=' . '"' . $EnabledEvent . '"' . ' UseDate=' . '"' . $UseDate . '"' . ' AdditionalTime=' . '"' . $AdditionalTime . '"' . 'EveryYear=' . '"' . $EveryYear . '"' . ' Imm="False"Above="False"FileName="C:\Users\CHRIS\Downloads\Kizz_Daniel_-_Rich_Till_I_Die_RTID_.mp3"  MuteLev="50" DelPrev=' . '"' . $DelPrev . '"' . ' DoNotRunIfStopped=' . '"' . $DoNotRunIfStopped . '"' . ' bRepeat=' . '"' . $bRepeat . '"' . ' nRepeatPer="10" DoNotMarkAsScheduled="False" nRepeat="1" RepeatLimit="False" Shuffle=' . '"' . $Shuffle . '"' . ' PausePlaylist="False" UseWeeks=' . '"' . $UseWeeks . '"' . ' Enqueue=' . '"' . $Enqueue . '"' . ' DelTaskAction=' . '"' . $DelTaskAction . '"' . ' DelTaskUseDate="True" DelTaskEveryYear="False" TaskName=' . '"' . $TaskName . '"' . ' ClearMainPlaylist=' . '"' . $ClearMainPlaylist . '"' . ' AddToPlaylistEnd=' . '"' . $AddToPlaylistEnd . '"' . ' UseDaysOfWeek=' . '"' . $UseDaysOfWeek . '"' . ' Hours=' . '"' . $Hours . '"' . ' Minutes=' . '"' . $Minutes . '"' . ' Seconds=' . '"' . $Seconds . '"' . ' IsDurationLimit="False" DurationLimit="0" TimeType="0" TaskNameAsTitle=' . '"' . $TaskNameAsTitle . '"' . ' ItemImageIndex="11" FontColor="15395562" BackColor="1644825" GroupName="" OverrideRelay="False" DTMFOn="False" DTMFString="" DTMFOnly="False" DTMFExitOn="False" DTMFExitString="" MaxTimeWaitOn="False" MaxTimeWaitSec="0" MaxTimeWaitAction="0" TimeToStart="" NextRunStr="" IntTimeToStart="0.309821782408108" WasStartedLast="False" ManualStart="0" UseFillers="False" FillersSource="" FillersRecurse="True" FillerMaxAmount="120" FillerAllowMax="False" Id="" Days=' . '"' . $Days . '"' . ' Weeks=' . '"' . $Weeks . '"' . ' Time=' . '"' . $Time . '"' . ' DelTaskTime=' . '"' . $DelTaskTime . '/>';
      $encode = urlencode($value);
      //dd($p);
      //dd($result);
      
        //dd($encode);

       return redirect()->away('http://'.$ipaddress.'/?pass='.$Password.'&action=schedule&type=add&event='. $encode);

        //return response($encode);
    }
}
