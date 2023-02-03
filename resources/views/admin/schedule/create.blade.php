<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('schedule') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Main content -->
                    <section class="content">
                        <div class="container-fluid">

                            <div class="row">
                                <div class="col-12">
                                    <!-- /.card -->

                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">schedules</h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                        <form method="PUT" action="{{url('findSchedule')}}" enctype="multipart/form-data">
                <!--<input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
                                                <div class="form-row align-items-center">

                                                    <div class="form-group col-md-4">
                                                        <label for="exampleFormControlFile1">Playlist/track
                                                            or
                                                            filename</label>
                                                        <input type="file" class="form-control-file"
                                                            id="exampleFormControlFile1" name="FileName">
                                                    </div>
                                                    <div class="col-auto my-1">
                                                        <label class="mr-sm-3"
                                                            for="inlineFormCustomSelect">Station</label>
                                                        <select class="custom-select mr-sm-3" name="station_id"
                                                            id="inlineFormCustomSelect">
                                                            @foreach ($stations as $s)
                                                            <option value="{{$s->id}}">{{$s->station_name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="inputEmail4">Task Name</label>
                                                        <input type="text" name="TaskName" class="form-control"
                                                            id="TaskName" placeholder="Task Name">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <fieldset class="scheduler-border">
                                                            <legend class="scheduler-border">Time and Day</legend>
                                                            <div class="row control-group">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="gridRadios" id="customControlValidation1"
                                                                        value="option1" checked>
                                                                    <label class="form-check-label" for="gridRadios1">
                                                                        Time
                                                                    </label>
                                                                </div>
                                                                <div class="controls bootstrap-timepicker">
                                                                    <input type="text" class="datetime" id="Time"
                                                                        name="Time" placeholder="Start Time" />
                                                                    <i class="icon-time"></i>
                                                                </div>
                                                            </div>
                                                            <div class="row control-group">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="gridRadios" id="customControlValidation2"
                                                                        value="option2" checked>
                                                                    <label class="form-check-label" for="gridRadios1">
                                                                        Hours
                                                                    </label>
                                                                </div>
                                                                <button type="button" style="background-color:gray;"
                                                                    class="btn btn-primary" data-toggle="modal"
                                                                    data-target="#exampleModal">
                                                                    <i class="fa fa-ellipsis-h"></i>
                                                                </button>
                                                            </div>
                                                            <!-- Modal -->
                                                            <div class="modal fade" id="exampleModal" tabindex="-1"
                                                                role="dialog" aria-labelledby="exampleModalLabel"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"
                                                                                id="exampleModalLabel">Hours</h5>
                                                                            <button type="button"
                                                                                style="background-color:gray;"
                                                                                class="close" data-dismiss="modal"
                                                                                aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="form-check">
                                                                                <input class="form-check-input"
                                                                                    type="radio" name="exampleRadios"
                                                                                    id="exampleRadios1" value="option1"
                                                                                    checked>
                                                                                <label class="form-check-label"
                                                                                    for="exampleRadios1">
                                                                                    Hours
                                                                                </label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input"
                                                                                    type="radio" name="exampleRadios"
                                                                                    id="exampleRadios2" value="option2">
                                                                                <label class="form-check-label"
                                                                                    for="exampleRadios2">
                                                                                    Start time list
                                                                                </label>
                                                                            </div>
                                                                            <fieldset>
                                                                                <div class="row">
                                                                                    <div class="col-12">

                                                                                        <input type="checkbox" id="all">
                                                                                        <label for="all">All</label>
                                                                                    </div>

                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-12">
                                                                                        <ul style="column-count: 4;">
                                                                                            <li>
                                                                                                <label
                                                                                                    class="container">0
                                                                                                    <input name="h0" value="1"
                                                                                                        type="checkbox">
                                                                                                    <span
                                                                                                        class="checkmark"></span>
                                                                                                </label>
                                                                                            </li>

                                                                                            <li>
                                                                                                <label
                                                                                                    class="container">1
                                                                                                    <input name="h1"
                                                                                                        type="checkbox">
                                                                                                    <span
                                                                                                        class="checkmark"></span>
                                                                                                </label>
                                                                                            </li>

                                                                                            <li>
                                                                                                <label
                                                                                                    class="container">2
                                                                                                    <input name="h2"
                                                                                                        type="checkbox">
                                                                                                    <span
                                                                                                        class="checkmark"></span>
                                                                                                </label>
                                                                                            </li>

                                                                                            <li>
                                                                                                <label
                                                                                                    class="container">3
                                                                                                    <input name="h3"
                                                                                                        type="checkbox">
                                                                                                    <span
                                                                                                        class="checkmark"></span>
                                                                                                </label>
                                                                                            </li>

                                                                                            <li>
                                                                                                <label
                                                                                                    class="container">4
                                                                                                    <input name="h4"
                                                                                                        type="checkbox">
                                                                                                    <span
                                                                                                        class="checkmark"></span>
                                                                                                </label>
                                                                                            </li>

                                                                                            <li>
                                                                                                <label
                                                                                                    class="container">5
                                                                                                    <input name="h5"
                                                                                                        type="checkbox">
                                                                                                    <span
                                                                                                        class="checkmark"></span>
                                                                                                </label>
                                                                                            </li>

                                                                                            <li>
                                                                                                <label
                                                                                                    class="container">6
                                                                                                    <input name="h6"
                                                                                                        type="checkbox">
                                                                                                    <span
                                                                                                        class="checkmark"></span>
                                                                                                </label>
                                                                                            </li>

                                                                                            <li>
                                                                                                <label
                                                                                                    class="container">7
                                                                                                    <input name="h7"
                                                                                                        type="checkbox">
                                                                                                    <span
                                                                                                        class="checkmark"></span>
                                                                                                </label>
                                                                                            </li>

                                                                                            <li>
                                                                                                <label
                                                                                                    class="container">8
                                                                                                    <input name="h8"
                                                                                                        type="checkbox">
                                                                                                    <span
                                                                                                        class="checkmark"></span>
                                                                                                </label>
                                                                                            </li>

                                                                                            <li>
                                                                                                <label
                                                                                                    class="container">9
                                                                                                    <input name="h9"
                                                                                                        type="checkbox">
                                                                                                    <span
                                                                                                        class="checkmark"></span>
                                                                                                </label>
                                                                                            </li>

                                                                                            <li>
                                                                                                <label
                                                                                                    class="container">10
                                                                                                    <input name="h10"
                                                                                                        type="checkbox">
                                                                                                    <span
                                                                                                        class="checkmark"></span>
                                                                                                </label>
                                                                                            </li>

                                                                                            <li>
                                                                                                <label
                                                                                                    class="container">11
                                                                                                    <input name="h11"
                                                                                                        type="checkbox">
                                                                                                    <span
                                                                                                        class="checkmark"></span>
                                                                                                </label>
                                                                                            </li>

                                                                                            <li>
                                                                                                <label
                                                                                                    class="container">12
                                                                                                    <input name="h12"
                                                                                                        type="checkbox">
                                                                                                    <span
                                                                                                        class="checkmark"></span>
                                                                                                </label>
                                                                                            </li>

                                                                                            <li>
                                                                                                <label
                                                                                                    class="container">13
                                                                                                    <input name="h13"
                                                                                                        type="checkbox">
                                                                                                    <span
                                                                                                        class="checkmark"></span>
                                                                                                </label>
                                                                                            </li>

                                                                                            <li>
                                                                                                <label
                                                                                                    class="container">14
                                                                                                    <input name="h14"
                                                                                                        type="checkbox">
                                                                                                    <span
                                                                                                        class="checkmark"></span>
                                                                                                </label>
                                                                                            </li>

                                                                                            <li>
                                                                                                <label
                                                                                                    class="container">15
                                                                                                    <input name="h15"
                                                                                                        type="checkbox">
                                                                                                    <span
                                                                                                        class="checkmark"></span>
                                                                                                </label>
                                                                                            </li>

                                                                                            <li>
                                                                                                <label
                                                                                                    class="container">16
                                                                                                    <input name="h16"
                                                                                                        type="checkbox">
                                                                                                    <span
                                                                                                        class="checkmark"></span>
                                                                                                </label>
                                                                                            </li>

                                                                                            <li>
                                                                                                <label
                                                                                                    class="container">17
                                                                                                    <input name="h17"
                                                                                                        type="checkbox">
                                                                                                    <span
                                                                                                        class="checkmark"></span>
                                                                                                </label>
                                                                                            </li>

                                                                                            <li>
                                                                                                <label
                                                                                                    class="container">18
                                                                                                    <input name="h18"
                                                                                                        type="checkbox">
                                                                                                    <span
                                                                                                        class="checkmark"></span>
                                                                                                </label>
                                                                                            </li>

                                                                                            <li>
                                                                                                <label
                                                                                                    class="container">19
                                                                                                    <input name="h19"
                                                                                                        type="checkbox">
                                                                                                    <span
                                                                                                        class="checkmark"></span>
                                                                                                </label>
                                                                                            </li>

                                                                                            <li>
                                                                                                <label
                                                                                                    class="container">20
                                                                                                    <input name="h20"
                                                                                                        type="checkbox">
                                                                                                    <span
                                                                                                        class="checkmark"></span>
                                                                                                </label>
                                                                                            </li>

                                                                                            <label class="container">21
                                                                                                <input name="h21"
                                                                                                    type="checkbox">
                                                                                                <span
                                                                                                    class="checkmark"></span>
                                                                                            </label>
                                                                                            </li>

                                                                                            <label class="container">22
                                                                                                <input name="h22"
                                                                                                    type="checkbox">
                                                                                                <span
                                                                                                    class="checkmark"></span>
                                                                                            </label>
                                                                                            </li>
                                                                                            <label class="container">23
                                                                                                <input name="h23"
                                                                                                    type="checkbox">
                                                                                                <span
                                                                                                    class="checkmark"></span>
                                                                                            </label>
                                                                                            </li>

                                                                                        </ul>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group row">
                                                                                    <label for="inputEmail3"
                                                                                        class="col-sm-3 col-form-label">Minutes</label>
                                                                                    <div class="col-sm-6">
                                                                                        <input type="text"
                                                                                            name="Minutes"
                                                                                            class="form-control"
                                                                                            id="inputMunites"
                                                                                            placeholder="Minutes">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group row">
                                                                                    <label for="inputSecond"
                                                                                        class="col-sm-3 col-form-label">Second</label>
                                                                                    <div class="col-sm-6">
                                                                                        <input type="number" min="0"
                                                                                            name="Seconds" max="59"
                                                                                            class="form-control"
                                                                                            id="inputSecond"
                                                                                            placeholder="Second">
                                                                                    </div>
                                                                                </div>
                                                                            </fieldset>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                style="background-color:gray;"
                                                                                class="btn btn-secondary"
                                                                                data-dismiss="modal">Close</button>
                                                                            <button type="button"
                                                                                style="background-color:blue;"
                                                                                class="btn btn-primary">Save
                                                                                changes</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row control-group">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        value="True" name="UseDate" id="invalidCheck2">
                                                                    <label class="form-check-label" for="invalidCheck2">
                                                                        Date
                                                                    </label>
                                                                </div>
                                                                <div class="controls bootstrap-timepicker">
                                                                    <input type="text" class="datetime" id="startTime"
                                                                        name="startTime" placeholder="Start Time" />
                                                                    <i class="icon-time"></i>
                                                                </div>
                                                            </div>
                                                            <div class="row control-group">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" name="UseDaysOfWeek"
                                                                        type="checkbox" value="True"
                                                                        id="UseDaysOfWeek	">
                                                                    <label class="form-check-label" for="UseDaysOfWeek">
                                                                        Week days
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="row control-group">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" name="sun"
                                                                        type="checkbox" value="1" id="sun">
                                                                    <label class="form-check-label" for="sun">
                                                                        Su
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" name="mon"
                                                                        type="checkbox" value="1" id="invalidCheck2">
                                                                    <label class="form-check-label" for="invalidCheck2">
                                                                        Mo
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" name="tus"
                                                                        type="checkbox" value="1" id="invalidCheck2">
                                                                    <label class="form-check-label" for="tus">
                                                                        Tu
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" name="wed"
                                                                        type="checkbox" value="1" id="invalidCheck2">
                                                                    <label class="form-check-label" for="wed">
                                                                        We
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" name="thu"
                                                                        type="checkbox" value="1" id="">
                                                                    <label class="form-check-label" for="thu">
                                                                        Thu
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" name="fri"
                                                                        type="checkbox" value="1" id="">
                                                                    <label class="form-check-label" for="fri">
                                                                        Fri
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" name="sat"
                                                                        type="checkbox" value="1" id="">
                                                                    <label class="form-check-label" for="invalidCheck2">
                                                                        Sat
                                                                    </label>
                                                                </div>
                                                            </div>

                                                            <div class="row control-group">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        value="True" id="UseWeeks" name="UseWeeks">
                                                                    <label class="form-check-label" for="">
                                                                        Weeks
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="row control-group">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        value="" id="invalidCheck2">
                                                                    <label class="form-check-label" for="invalidCheck2">
                                                                        1st
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        value="" id="invalidCheck2">
                                                                    <label class="form-check-label" for="invalidCheck2">
                                                                        2nd
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        value="" id="invalidCheck2">
                                                                    <label class="form-check-label" for="invalidCheck2">
                                                                        3rd
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        value="" id="invalidCheck2" >
                                                                    <label class="form-check-label" for="invalidCheck2">
                                                                        4th
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        value="" id="invalidCheck2" >
                                                                    <label class="form-check-label" for="invalidCheck2">
                                                                        Last
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                        <fieldset class="scheduler-border">
                                                            <legend>Expiration</legend>
                                                            <div class="row control-group">
                                                                <div class="col-auto my-1">
                                                                    <select name="DelTaskAction"
                                                                        class="custom-select mr-sm-2" id="">
                                                                        <option value="0">No expiration</option>
                                                                        <option value="1">Delete event</option>
                                                                        <option selected value="2">Disable event
                                                                        </option>


                                                                    </select>
                                                                </div>

                                                                <div class="col-auto my-1 bootstrap-timepicker">
                                                                    <input type="text"
                                                                        class="custom-select mr-sm-1 datetime"
                                                                        id="" name="DelTime"
                                                                        placeholder="Start Time" />
                                                                    <i class="icon-time"></i>
                                                                </div>
                                                                <div class="controls bootstrap-timepicker">
                                                                    <input type="text" class="datetime" id="DelTaskTime"
                                                                        name="DelTaskTime" placeholder="Start Time" />
                                                                    <i class="icon-time"></i>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                        <fieldset class="scheduler-border">
                                                            <legend>Repeat</legend>
                                                            <div class="row control-group">
                                                                <div class="form-check">
                                                                    <input name="bRepeat" class="form-check-input"
                                                                        type="checkbox" value="True" id="">
                                                                    <label class="form-check-label" for="invalidCheck2">
                                                                        Repeat every
                                                                    </label>
                                                                </div>
                                                                <div class="controls bootstrap-timepicker">
                                                                    <input type="text" class="datetime" id=""
                                                                        name="nRepeatPer" />
                                                                    <label class="form-check-label" for="invalidCheck2">
                                                                        min
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="row control-group">
                                                                <div class="form-check">
                                                                    <input name="RepeatLimit" class="form-check-input"
                                                                        type="checkbox" value="True">
                                                                    <label class="form-check-label" for="invalidCheck2">
                                                                        no more than
                                                                    </label>
                                                                </div>
                                                                <div class="controls bootstrap-timepicker">
                                                                    <input type="number" min="0" name="nRepeat" id="" />
                                                                    <label class="form-check-label" for="nRepeat">
                                                                        times
                                                                    </label>
                                                                </div>
                                                            </div>

                                                        </fieldset>
                                                    </div>
                                                    <div class="col">
                                                        <fieldset class="scheduler-border">
                                                            <legend class="scheduler-border">Options</legend>
                                                            <div class="form-check">
                                                                <input class="form-check-input" name="EnabledEvent"
                                                                    type="checkbox" value="True" id="defaultCheck1">
                                                                <label class="form-check-label" for="defaultCheck1">
                                                                    Enable Event
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" name="DoNotRunIfStopped"
                                                                    type="checkbox" value="True" id="">
                                                                <label class="form-check-label" for="defaultCheck2">
                                                                    Do not action this event when playlist is stopped
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" name="TaskNameAsTitle"
                                                                    type="checkbox" value="True" id="TaskNameAsTitle">
                                                                <label class="form-check-label" for="TaskNameAsTitle">
                                                                    Send task name instead of track titles to server
                                                                </label>
                                                            </div>
                                                            <hr>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value=""
                                                                    id="defaultCheck2">
                                                                <label class="form-check-label" for="defaultCheck2">
                                                                    Run schedule launch without waiting for current
                                                                    track to finish
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value=""
                                                                    id="defaultCheck1">
                                                                <label class="form-check-label" for="defaultCheck1">
                                                                    Insert a sweeper before starting an event
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    name="Enqueue" value="True" id="Enqueue">
                                                                <label class="form-check-label" for="defaultCheck2">
                                                                    If there are tracks from the schedule in the
                                                                    playlist, enqueue
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" name="DelPrev"
                                                                    type="checkbox" value="True" id="DelPrev">
                                                                <label class="form-check-label" for="defaultCheck1">
                                                                    Remove previous schedule from the playlist
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" name="ClearMainPlaylist"
                                                                    type="checkbox" value="True" id="ClearMainPlaylist">
                                                                <label class="form-check-label" for="ClearMainPlaylist">
                                                                    Clear playlist
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    name="AddToPlaylistEnd" value="True"
                                                                    id="AddToPlaylistEnd">
                                                                <label class="form-check-label" for="AddToPlaylistEnd">
                                                                    Add to the end of the playlist
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    name="Shuffle" value="False" id="Shuffle">
                                                                <label class="form-check-label" for="Shuffle">
                                                                    Shuffle the playlist before inserting
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value=""
                                                                    id="defaultCheck1">
                                                                <label class="form-check-label" for="defaultCheck1">
                                                                    Insert as regular playlist tracks
                                                                </label>
                                                            </div>
                                                            <hr>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value=""
                                                                    id="defaultCheck2">
                                                                <label class="form-check-label" for="defaultCheck2">
                                                                    Overlay playback
                                                                </label>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                                <div>
                                                    <button type="submit"
                                                        style="position:relative; left:230px; top:2px; background-color:brown;"
                                                        class="btn btn-warning">Submit
                                                        Schedule</button>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.container-fluid -->
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>