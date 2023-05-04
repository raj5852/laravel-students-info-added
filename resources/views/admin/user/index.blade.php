@extends('layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Add User</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6"></div>
                    <!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="text-danger"> {{ $error }} </li>
                    @endforeach
                </ul>

                @endif
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success')  }}</div>
                @endif
                <div class="card">
                    <div class="card-body">
                       <form action="{{ route('users.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-7">
                                <div class="mb-3">
                                    <label for="">Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter user name">
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="mb-3">
                                    <label for="">Email</label>
                                    <input type="text" name="email" class="form-control" placeholder="Enter user Email">
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="mb-3">
                                    <label for="">password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Enter user password">
                                </div>
                            </div>
                            <div class="col-md-7">
                                <button class="btn btn-primary">Save</button>
                            </div>
                        </div>
                       </form>
                    </div>
                </div>
                <br>

                <div class="card">
                    <div class="card-header">
                       <div class="row">
                        <div class="col-md-6">
                            <h4>All User List</h4>

                        </div>
                        <div class="col-md-6">
                            <div class="float-right">
                                <form action="{{ route('users.index') }}" method="GET">

                                    <div class="d-flex">
                                        <input type="text" name="emailsearch" class="form-control" value="{{ request()->get('emailsearch') }}" placeholder="Search by email">
                                    <button class="btn btn-primary btn-sm">Search</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                       </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{++$i }} </td>
                                        <td>{{$user->name}} </td>
                                        <td>{{$user->email}} </td>
                                        <td>{{$user->show_password}} </td>
                                        <td class="d-flex">
                                        <a href="{{ route('users.show',$user->id) }}" class="btn btn-success btn-sm" style="margin-right: 2px">View</a>
                                        {{-- <a href="{{ route('users.edit',$user->id) }}" class="btn btn-primary btn-sm">Edit</a> --}}
                                        <form action="{{ route('users.destroy',$user->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button  class="btn btn-danger btn-sm">Delete</button>

                                        </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table><br>
                        {!!  $users->links() !!}
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
