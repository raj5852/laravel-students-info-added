@extends('layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">All info</h1>
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
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Profile</th>
                                            <th>Educational Qualification</th>
                                            <th>Date of birth</th>
                                            <th>Division</th>
                                            <th>District</th>
                                            <th>Home District</th>
                                            <th>Upazila</th>
                                            <th>Batch</th>
                                            <th>Joining date</th>
                                            <th>Joining date of new Station</th>
                                            <th>Designation</th>
                                            <th>Appointed</th>
                                            <th>CurrentPosting</th>
                                            <th>Previousposting</th>
                                            <th>Bloodgroup</th>
                                            <th>Mobile</th>
                                            <th>Email</th>
                                            {{-- <th>Last Name</th> --}}
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $user->name }}</td>
                                                <td><img src="{{ asset($user->profile_img) }}" style="width: 80px; "
                                                        alt=""> </td>
                                                <td>{{ $user->educational_qualification }} </td>
                                                <td>{{ $user->date_of_birth }} </td>
                                                <td>{{ $user->divisiondata->name }} </td>
                                                <td>{{ $user->districtdata->name }} </td>
                                                <td>{{ $user->home_district }} </td>

                                                <td>{{ $user->upaziladata->name }} </td>
                                                <td>{{ $user->batchdata->name }} </td>
                                                <td>{{ $user->working_from }} </td>
                                                <td>{{ $user->new_section }} </td>
                                                <td> {{ $user->designationdata->name }}
                                                    @if ($user->last_name_of_regi)
                                                        ({{ $user->last_name_of_regi }})
                                                    @endif

                                                    @if ($user->last_name_of_attach)
                                                        (
                                                        {{ $user->last_name_of_attach }}
                                                        )
                                                    @endif



                                                </td>
                                                <td>{{ $user->appointed }} </td>
                                                <td>{{ $user->currentPosting }} </td>
                                                <td>{{ $user->previousposting }} </td>
                                                <td>{{ $user->bloodgroup }} </td>
                                                <td>{{ $user->mobile }} </td>
                                                <td>{{ $user->email }} </td>
                                                <td>
                                                    {{-- <a href="{{ route('infoedit', $user->id) }}"
                                                        class="btn btn-primary btn-sm">Edit</a> --}}
                                                        @if ($user->status == 'pending')
                                                            <a href="{{ route('info-accept',$user->id) }}"  class="btn btn-success btn-sm">Accepte</a>
                                                        @endif
                                                    <a onclick="return confirm('Are you sure?')"
                                                        href="{{ route('userformDelete', $user->id) }}"
                                                        class="btn btn-danger btn-sm">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
