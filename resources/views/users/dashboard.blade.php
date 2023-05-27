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
                                        <input type="file" name="profile_img" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="">Name</label>
                                        <input type="text" name="name" value="{{ old('name') }}"
                                            placeholder="Enter Your name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="">Educational Qualification</label>
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
                                        <label for="">Home District</label>
                                        <input type="text" name="home_district" placeholder="Home district"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="">Divisions</label>
                                        <select name="division" id="division" class="form-control" required>
                                            <option value="">Select Division</option>
                                            @foreach ($divisions as $division)
                                                <option value="{{ $division->id }}">{{ $division->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="">District</label>
                                        <select name="district" id="district" class="form-control" required>
                                            <option value="">Select District</option>
                                        </select>
                                    </div>
                                </div>




                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="">Upazila</label>
                                        <select name="upazila" id="upazila" class="form-control" required>
                                            <option value="">Select Upazila</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="">Batch</label>
                                        <select class="form-control" name="batch" id="" required>
                                            <option value="">Select Batch</option>
                                            @foreach ($batches as $batch)
                                                <option value="{{ $batch->id }}">{{ $batch->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="">Joining Date</label>
                                        <input type="text" value="{{ old('working_from') }}" name="working_from"
                                            placeholder="Joining Date" class="form-control" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="">Joining Date of New Station</label>
                                        <input type="text" value="{{ old('new_section') }}" name="new_section"
                                            placeholder="Joining date of new Station" class="form-control" >
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="">Designation</label>
                                        <select name="designation" class="form-control" id="">
                                            <option value="">Select Designation</option>
                                            @foreach ($designations as $designation)
                                                <option value="{{ $designation->id }}">{{ $designation->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div id="Registration_Directorate" class="col-md-6" style="display: none">
                                    <div class="mb-3">
                                        <label for="">Last name</label>
                                        <select name="last_name_of_regi" class="form-control" id="">
                                            <option value="">Select Last name</option>
                                            <option value="IGR">IGR</option>
                                            <option value="AIGR">AIGR</option>
                                            <option value="DIGR">DIGR</option>
                                            <option value="IRO">IRO</option>
                                            <option value="District Registrar">District Registrar</option>
                                            <option value="Sub Registrar">Sub Registrar</option>

                                            <option value="Office stuff">Office stuff</option>
                                        </select>
                                    </div>
                                </div>


                                <div id="Attach_To_Registration" class="col-md-6" style="display: none">
                                    <div class="mb-3">
                                        <label for="">Last name</label>
                                        <select name="last_name_of_attach" class="form-control" id="">
                                            <option value="">Select Last name</option>
                                            <option value="District Registrar">District Registrar</option>
                                            <option value="Sub Registrar">Sub Registrar</option>
                                        </select>
                                    </div>
                                </div>


                                {{-- <div id="Registration_Directorate" class="mb-3" style="display: none">
                                    <label for="">Last name</label>
                                    <select name="designation" class="form-control" id="">
                                        <option value="">Select Last name</option>
                                        <option  value="IGR">IGR</option>
                                        <option value="AIGR">AIGR</option>
                                        <option value="DIGR">DIGR</option>
                                        <option value="IRO">IRO</option>
                                        <option value="Office stuff">Office stuff</option>
                                    </select>
                                </div> --}}


                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="">Appointed By</label>
                                        <input type="text" value="{{ old('appointed') }}" name="appointed"
                                            placeholder="Appointed By" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="">Current Posting</label>
                                        <input type="text" value="{{ old('currentPosting') }}" name="currentPosting"
                                            placeholder="Current Posting" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="">Previous Posting</label>
                                        <input type="text" value="{{ old('previousposting') }}"
                                            name="previousposting" placeholder="Previous Posting" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="">Blood Group</label>
                                        <input type="text" value="{{ old('bloodgroup') }}" name="bloodgroup"
                                            placeholder="Blood Group" class="form-control">
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
                                        <th>Home District</th>
                                        <th>Upazila</th>
                                        <th>Batch</th>
                                        <th>Joining Date</th>
                                        <th>Joining Date of New Station</th>
                                        <th>Designation</th>
                                        <th>Appointed By</th>
                                        <th>Current Posting</th>
                                        <th>Previous Posting</th>
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
                                                <a href="{{ route('infoedit', $user->id) }}"
                                                    class="btn btn-primary btn-sm">Edit</a>
                                                <a onclick="return confirm('Are you sure?')"
                                                    href="{{ route('userformDelete', $user->id) }}"
                                                    class="btn btn-danger btn-sm">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection


@section('js')
    <script>
        $(document).ready(function() {
            $('#division').on('change', function() {
                var division_id = $(this).val();

                if (division_id) {
                    $('#district').prop('disabled', false);
                    $('#district').html('<option value="">Loading...</option>');
                    $('#upazila').prop('disabled', true);

                    $.ajax({
                        url: '/user/get-districts',
                        type: 'GET',
                        data: {
                            division_id: division_id
                        },
                        success: function(data) {
                            $('#district').html('<option value="">Select District</option>');
                            $.each(data, function(key, value) {
                                $('#district').append('<option value="' + key + '">' +
                                    value + '</option>');
                            });
                        }
                    });
                } else {
                    $('#district').prop('disabled', true);
                    $('#district').html('<option value="">Select District</option>');
                    $('#upazila').prop('disabled', true);
                    $('#upazila').html('<option value="">Select Upazila</option>');
                }
            });

            $('#district').on('change', function() {
                var district_id = $(this).val();

                if (district_id) {
                    $('#upazila').prop('disabled', false);

                    $('#upazila').html('<option value="">Loading...</option>');

                    $.ajax({
                        url: '/user/get-upazilas',
                        type: 'GET',
                        data: {
                            district_id: district_id
                        },
                        success: function(data) {
                            $('#upazila').html('<option value="">Select Upazila</option>');
                            $.each(data, function(key, value) {
                                $('#upazila').append('<option value="' + key + '">' +
                                    value + '</option>');
                            });
                        }
                    });


                } else {
                    $('#upazila').prop('disabled', true);
                    $('#upazila').html('<option value="">Select Upazila</option>');
                }

            })

            $("select[name='designation']").change(function() {
                var selectedValue = $(this).val();
                $("#Registration_Directorate").css("display", "none");
                $("#Attach_To_Registration").css("display", "none");

                if (selectedValue == 1) {
                    $("#Registration_Directorate").css("display", "block");
                }

                if (selectedValue == 4) {
                    $("#Attach_To_Registration").css("display", "block");
                }

            });

        })
    </script>
@endsection
