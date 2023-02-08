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
                            <p class="">
                                <a class="btn btn-primary" data-toggle="modal" data-target="#AddModal">Create New
                                    schedule</a>
                                <x-add-modal title="Add new schedule" routeName="schedule">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">schedule</label>
                                        <input type="text" class="form-control" name="schedule" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" placeholder="Enter schedule">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Status</label>
                                        <select class="form-control" name="status" id="exampleFormControlSelect1">
                                            <option selected disabled>Select a status</option>
                                            <option value="active">Active</option>
                                            <option value="inactive">Inactive</option>
                                        </select>
                                    </div>
                                </x-add-modal>
                            </p>
                            <div class="row">
                                <div class="col-12">
                                    @if ($errors->any())
                                    <div class="alert alert-danger fade show" role="alert">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                            <li style="list-style: none">{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif

                                    <!-- /.card -->

                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">schedules</h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <table id="example1" class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Run in</th>
                                                        <th>Status</th>
                                                        <th>Time</th>
                                                        <th>Action</th>
                                                        <th>Name</th>
                                                        <th>Expiration Status</th>
                                                        <th>Expiration Date</th>
                                                        <th>Week Days</th>
                                                        <th>Next Run</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($phpArray as $item)
                                                    @php
                                                    
                                                    if ($item['@attributes']['EnabledEvent'] === 'False')
                                                    {
                                                    
                                                     $rowclass = 'blue';
                                                    
                                                    }
                                                    @endphp

                                                    <tr>
                                                        <td>{{ $item['@attributes']['TimeToStart'] }}</td>
                                                        <td>{{ $item['@attributes']['EnabledEvent'] }}</td>
                                                        <td>{{ date("h:i:s A", strtotime($item['@attributes']['Time']))}}
                                                        </td>
                                                        <td>{{ $item['@attributes']['FileName'] }}</td>
                                                        <td>{{ $item['@attributes']['TaskName'] }}</td>
                                                        <td>{{ $item['@attributes']['DelTaskAction'] }}</td>
                                                        <td>{{ $item['@attributes']['DelTaskTime'] }}</td>
                                                        <td>{{ $item['@attributes']['Days'] }}</td>
                                                        <td>{{ $item['@attributes']['NextRunStr'] }}</td>


                                                        <td>
                                                            <div class="dropdown show">
                                                                <a class="btn btn-success dropdown-toggle" role="button"
                                                                    id="dropdownMenuLink" data-toggle="dropdown"
                                                                    aria-haspopup="true" aria-expanded="false">
                                                                    Action
                                                                </a>
                                                            </div>

                                                        </td>

                                                    </tr>
                                                    @endforeach



                                                </tbody>
                                                <!-- <tfoot>
                                    <tr>
                                        <th>Member ID</th>
                                            <th>Title</th>
                                            <th>Name</th>
                                            <th>Savings Amount</th>
                                            <th>Location</th>
                                            <th>Date joined</th>
                                            <th>Action</th>
                                    </tr>
                                </tfoot> -->
                                            </table>
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