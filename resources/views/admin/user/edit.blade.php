@extends('layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit User</h1>
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
                    <div class="alert alert-success">User Created successfully!</div>
                @endif
                <div class="card">
                    <div class="card-body">
                       <form action="{{ route('users.update',$user->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-7">
                                <div class="mb-3">
                                    <label for="">Name</label>
                                    <input type="text" value="{{ $user->name }}" name="name" class="form-control" placeholder="Enter user name">
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="mb-3">
                                    <label for="">Email</label>
                                    <input type="text" value="{{ $user->email }}" name="email" class="form-control" placeholder="Enter user Email">
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="mb-3">
                                    <label for="">Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Enter user password">
                                </div>
                            </div>
                            <div class="col-md-7">
                                <button class="btn btn-primary">Update</button>
                            </div>
                        </div>
                       </form>
                    </div>
                </div>
                <br>


            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
