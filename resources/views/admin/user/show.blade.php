@extends('layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Show User</h1>
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
              <div class="card">
              <div class="card-body">
                <p><b>Name:</b> {{ $user->name ?? '' }} </p>
                <p><b>Educational qualification:</b> {{ $user->educational_qualification ?? '' }} </p>
                <p><b>Date Of Birth:</b> {{ $user->date_of_birth ?? '' }}</p>
                <p><b>District:</b> {{ $user->district ?? '' }}</p>
                <p><b>Working From:</b> {{ $user->working_from ?? '' }}</p>
                <p><b>Appointed:</b> {{ $user->appointed ?? '' }}</p>
                <p><b>CurrentPosting:</b> {{ $user->currentPosting ?? '' }}</p>
                <p><b>PreviousPosting:</b>  {{ $user->previousposting ?? '' }}</p>
                <p><b>BloodGroup:</b> {{ $user->bloodgroup ?? '' }}</p>
                <p><b>Mobile:</b> {{ $user->mobile ?? '' }}</p>
                <p><b>Email:</b> {{ $user->email ?? '' }}</p>
              </div>
              </div>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
