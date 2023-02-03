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
                <a class="btn btn-primary"  data-toggle="modal" data-target="#AddModal">Create New schedule</a>
                <x-add-modal title="Add new schedule" routeName="schedule">
                    <div class="form-group">
                        <label for="exampleInputEmail1">schedule</label>
                        <input type="text" class="form-control" name="schedule" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter schedule">
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
                        <div class="card-body" >
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Run in</th>
                                        <th>Time</th>
                                        <th>Action</th>
                                        <th>Name</th>
                                        <th>Week Days</th>
                                        <th>Next Run</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($schedule as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->Time }}</td>
                                            <td>{{ $item->FileName}}</td>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->Time }}</td>
                                            <td>{{ $item->status }}</td>
                                            
                                            <td>
                                                <div class="dropdown show">
                                                    <a class="btn btn-success dropdown-toggle" role="button"
                                                        id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        Action
                                                    </a>

                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                        <a  data-toggle="modal" data-target="#UpdateModal{{$item->id}}"
                                                            class="dropdown-item">
                                                            <i class="nav-icon fas fa-copy" style="color: blue"></i>
                                                            Edit
                                                        </a>
                                                        <form action="{{ route('schedule.destroy', $item->id)}}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="dropdown-item">
                                                                <i class="nav-icon fas fa-cut" style="color: red"></i>
                                                                Terminate
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                                <x-edit-modal title="Update schedule" routeName="schedule" :id="$item->id">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">schedule</label>
                                                        <input type="text" class="form-control" name="schedule" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter schedule" value="{{ $item->schedule }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlSelect1">Status</label>
                                                        <select class="form-control" name="status" id="exampleFormControlSelect1">
                                                            <option selected disabled>Select a status</option>
                                                            <option value="active" {{$item->status == 'active' ? 'selected' : ''}}>Active</option>
                                                            <option value="inactive" {{$item->status == 'inactive' ? 'selected' : ''}}>Inactive</option>
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