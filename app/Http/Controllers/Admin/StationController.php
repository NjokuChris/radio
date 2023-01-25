<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\station;
use App\Models\state;

class StationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $station = Station::all();
        $states = state::all();
        return view('Admin.station.index', ['station' => $station, 'states' => $states]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stations = station::paginate(5);
        $units = unit::all();
        $locations = state::all();
        return view('Admin.stations.index', ['stations' => $stations, 'units' => $units, 'locations' => $locations]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, station $station)
    {
        $request->validate([
            'station_name' => ['required'],

        ]);
        $station->station_name = $request->station_name;
        $station->frequency = $request->frequency;
        $station->Location = $request->Location;
        $station->state_id = $request->state_id;
        $station->address = $request->address;
        $station->posted_by = Auth::user()->id;
        $station->station_ip = $request->station_ip;
        $station->port = $request->port;
        $station->password = $request->password;
        
        $station->save();

        return redirect('admin/station');
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
