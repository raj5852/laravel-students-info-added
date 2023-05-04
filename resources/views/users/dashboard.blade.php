@extends('layouts.user')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
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
                            <li class="text-danger">{{ $error }} </li>
                        @endforeach
                    </ul>
                @endif


                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif



                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('post.userinfo') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="">Image</label>
                                        <input type="file" name="profile_img"  class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="">Name</label>
                                        <input type="text"  name="name" value="{{ old('name') }}"
                                            placeholder="Enter Your name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="">Educational qualification</label>
                                        <input type="text" value="{{ old('educational_qualification') }}"
                                            name="educational_qualification" placeholder="Enter Educational qualification"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="">Date Of Birth</label>
                                        <input type="date" value="{{ old('date_of_birth') }}" name="date_of_birth"
                                            placeholder="Date Of Birth" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="">Divisions</label>
                                        <select name="division" id=""  class="form-control">
                                            @foreach ($divisions as $division)
                                                <option value="{{$division->name }}">{{ $division->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="">District</label>
                                        <input type="text" value="{{ old('district') }}" name="district"
                                            placeholder="Enter your district" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="">Upazila</label>
                                        <input type="text" value="{{ old('upazila') }}" name="upazila"
                                            placeholder="Enter your upazila" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="">Batch</label>
                                        <input type="text" value="{{ old('batch') }}" name="batch"
                                            placeholder="Enter your Batch" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="">Working From</label>
                                        <input type="text" value="{{  old('working_from') }}" name="working_from"
                                            placeholder="Working From" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="">Appointed</label>
                                        <input type="text" value="{{ old('appointed') }}" name="appointed"
                                            placeholder="Appointed" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="">CurrentPosting</label>
                                        <input type="text" value="{{  old('currentPosting')}}"
                                            name="currentPosting" placeholder="CurrentPosting" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="">PreviousPosting</label>
                                        <input type="text" value="{{  old('previousposting') }}"
                                            name="previousposting" placeholder="PreviousPosting" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="">BloodGroup</label>
                                        <input type="text" value="{{ old('bloodgroup') }}" name="bloodgroup"
                                            placeholder="BloodGroup" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="">Mobile</label>
                                        <input type="number" value="{{ old('mobile') }}" name="mobile"
                                            placeholder="Enter your mobile number" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="">Email</label>
                                        <input type="email" value="{{ old('email') }}" name="email"
                                            placeholder="Enter your Email number" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <center>
                                <button type="submit" class="btn btn-primary">Save</button>

                            </center>
                        </form>
                    </div>
                </div>

                <br>
                <br>

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
                                        <th>Upazila</th>
                                        <th>Batch</th>
                                        <th>Working From</th>
                                        <th>Appointed</th>
                                        <th>CurrentPosting</th>
                                        <th>Previousposting</th>
                                        <th>Bloodgroup</th>
                                        <th>Mobile</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{$user->name}}</td>
                                            <td><img src="{{  asset($user->profile_img) }}" style="width: 80px; " alt=""> </td>
                                            <td>{{ $user->educational_qualification }} </td>
                                            <td>{{ $user->date_of_birth }} </td>
                                            <td>{{ $user->division }} </td>
                                            <td>{{ $user->district }} </td>
                                            <td>{{ $user->upazila }} </td>
                                            <td>{{ $user->batch }} </td>
                                            <td>{{ $user->working_from }} </td>
                                            <td>{{ $user->appointed }} </td>
                                            <td>{{ $user->currentPosting }} </td>
                                            <td>{{ $user->previousposting }} </td>
                                            <td>{{ $user->bloodgroup }} </td>
                                            <td>{{ $user->mobile }} </td>
                                            <td>{{ $user->email }} </td>
                                            <td>
                                           <a href="{{ route('userformDelete',$user->id) }}" class="btn btn-danger btn-sm">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
