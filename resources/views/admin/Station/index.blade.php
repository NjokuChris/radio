<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('station') }}
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
                                    station</a>
                                <x-add-modal title="Add new station" routeName="station">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Station</label>
                                        <input type="text" class="form-control" name="station_name" id=""
                                            placeholder="Enter station">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Frequency</label>
                                        <input type="text" class="form-control" name="frequency"
                                            placeholder="Enter Frequency">
                                    </div>
                                    <fieldset class="scheduler-border">
                                        <legend class="scheduler-border">API Details</legend>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Stations IP Address</label>
                                            <input type="text" class="form-control" name="station_ip"
                                                id="exampleInputEmail1" placeholder="Enter station IP Address">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Port:</label>
                                            <input type="number" min="0" class="form-control" name="port"
                                                id="exampleInputEmail1" placeholder="Enter Listening Port">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Password:</label>
                                            <input type="password" class="form-control" id="myInput" name="password"
                                                placeholder="Enter station Password">
                                            <!-- An element to toggle between password visibility -->
                                            <input type="checkbox" onclick="showPassword()">Show Password
                                        </div>
                                    </fieldset>
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">State</label>
                                        <select class="form-control" name="state_id" id="">
                                        @foreach ($states as $s)
                                            <option value="{{$s->id}}">{{$s->state_name}}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Location</label>
                                        <input type="text" class="form-control" name="location"
                                            placeholder="Enter station Location">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Address</label>
                                        <textarea class="form-control" name="address" rows="3"></textarea>
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
                                            <h3 class="card-title">stations</h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <table id="example1" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Station</th>
                                                        <th>Frequency</th>
                                                        <th>Address</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($station as $item)
                                                    <tr>
                                                        <td>{{ $item->id }}</td>
                                                        <td>{{ $item->station_name }}</td>
                                                        <td>{{ $item->frequency}}</td>
                                                        <td>{{ $item->address }}</td>

                                                        <td>
                                                            <div class="dropdown show">
                                                                <a class="btn btn-success dropdown-toggle" role="button"
                                                                    id="dropdownMenuLink" data-toggle="dropdown"
                                                                    aria-haspopup="true" aria-expanded="false">
                                                                    Action
                                                                </a>

                                                                <div class="dropdown-menu"
                                                                    aria-labelledby="dropdownMenuLink">
                                                                    <a data-toggle="modal"
                                                                        data-target="#UpdateModal{{$item->id}}"
                                                                        class="dropdown-item">
                                                                        <i class="nav-icon fas fa-copy"
                                                                            style="color: blue"></i>
                                                                        Edit
                                                                    </a>
                                                                    <form
                                                                        action="{{ route('station.destroy', $item->id)}}"
                                                                        method="post">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="dropdown-item">
                                                                            <i class="nav-icon fas fa-cut"
                                                                                style="color: red"></i>
                                                                            Terminate
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                            <x-edit-modal title="Update station" routeName="station"
                                                                :id="$item->id">
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">station</label>
                                                                    <input type="text" class="form-control"
                                                                        name="station" id="exampleInputEmail1"
                                                                        aria-describedby="emailHelp"
                                                                        placeholder="Enter station"
                                                                        value="{{ $item->station }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label
                                                                        for="exampleFormControlSelect1">Status</label>
                                                                    <select class="form-control" name="status"
                                                                        id="exampleFormControlSelect1">
                                                                        <option selected disabled>Select a status
                                                                        </option>
                                                                        <option value="active"
                                                                            {{$item->status == 'active' ? 'selected' : ''}}>
                                                                            Active</option>
                                                                        <option value="inactive"
                                                                            {{$item->status == 'inactive' ? 'selected' : ''}}>
                                                                            Inactive</option>
                                                                    </select>
                                                                </div>
                                                            </x-edit-modal>
                                                        </td>

                                                    </tr>
                                                    @endforeach



                                                </tbody>
                                                {{-- <tfoot>
                                    <tr>
                                        <th>Member ID</th>
                                            <th>Title</th>
                                            <th>Name</th>
                                            <th>Savings Amount</th>
                                            <th>Location</th>
                                            <th>Date joined</th>
                                            <th>Action</th>
                                    </tr>
                                </tfoot> --}}
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