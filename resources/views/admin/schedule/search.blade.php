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
                                            <h3 class="card-title">Search Schedules</h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                        <form method="post" action="{{ route('schedule_show')}}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    @method('GET')
                                                <div class="form-row">

                                                    
                                                    <div class="form-group col-md-6">
                                                        <label for="State">Stations</label>
                                                        <select class="form-control" name="station_id"
                                                            id="">
                                                            @foreach ($stations as $s)
                                                            <option value="{{$s->id}}">{{$s->station_name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                   
                                                </div>
                                                
                                                <div>
                                                    <button type="submit"
                                                        style="position:relative; left:230px; top:2px; background-color:brown;"
                                                        class="btn btn-warning">Search
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