@extends('layouts.user')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Info</h1>
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
                        <form action="{{ route('post.userinfo.update',$data->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <div class="col-md-6">

                                    <div class="mb-3">
                                        <label for="">Image</label>
                                        <input type="file" name="profile_img" class="form-control">
                                    </div>
                                <img src="{{ asset($data->profile_img) }}" alt="" width="80">

                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="">Name</label>
                                        <input type="text" name="name" value="{{ $data->name }}"
                                            placeholder="Enter Your name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="">Educational qualification</label>
                                        <input type="text" value="{{ $data->educational_qualification }}"
                                            name="educational_qualification" placeholder="Enter Educational qualification"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="">Date Of Birth</label>
                                        <input type="date" value="{{ $data->date_of_birth }}" name="date_of_birth"
                                            placeholder="Date Of Birth" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="">Divisions</label>
                                        <select name="division" id="division" class="form-control">
                                            @foreach ($divisions as $division)
                                                <option @if($data->division == $division->id) selected @endif  value="{{ $division->id }}">{{ $division->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="">Home district</label>
                                        <input type="text" name="home_district" placeholder="Home district"
                                            class="form-control" value="{{ $data->home_district }}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="">District</label>
                                        <select name="district" id="district" class="form-control">
                                            <option value="">Select District</option>

                                            @foreach ($district as $dt)
                                                <option @if ($dt->id == $data->district) selected  @endif  value="{{ $dt->id }}">{{ $dt->name }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>



                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="">Upazila</label>
                                        <select name="upazila" id="upazila" class="form-control">
                                            @foreach ($upzila as $dt)
                                                <option @if ($dt->id == $data->upazila) selected  @endif  value="{{ $dt->id }}">{{ $dt->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="">Batch</label>
                                        <select class="form-control" name="batch" id="">
                                            <option value="">Select Batch</option>
                                            @foreach ($batches as $batch)
                                                <option @if($batch->id == $data->batch) selected @endif  value="{{ $batch->id }}">{{ $batch->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="">Joining date</label>
                                        <input type="text" value="{{ $data->working_from }}" name="working_from"
                                            placeholder="Joining date" class="form-control" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="">Joining date of new Station</label>
                                        <input type="text" value="{{ $data->new_section }}" name="new_section"
                                            placeholder="Joining date of new Station" class="form-control" >
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="">Designation</label>
                                        <select name="designation" class="form-control" id="">
                                            <option value="">Select Designation</option>
                                            @foreach ($designations as $designation)
                                                <option @if($designation->id == $data->designation)selected @endif value="{{ $designation->id }}">{{ $designation->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                <div id="Registration_Directorate" class="col-md-6" @if(!$data->last_name_of_regi) style="display: none" @endif >
                                    <div class="mb-3">
                                        <label for="">Last name</label>
                                        <select value="{{  $data->last_name_of_regi }}" name="last_name_of_regi" class="form-control" id="">
                                            <option  value="">Select Last name</option>
                                            <option {{$data->last_name_of_regi == 'IGR' ? 'selected':'' }} value="IGR">IGR</option>
                                            <option {{$data->last_name_of_regi == 'AIGR' ? 'selected':'' }} value="AIGR">AIGR</option>
                                            <option {{$data->last_name_of_regi == 'DIGR' ? 'selected':'' }}  value="DIGR">DIGR</option>
                                            <option  {{$data->last_name_of_regi == 'IRO' ? 'selected':'' }} value="IRO">IRO</option>
                                            <option {{$data->last_name_of_regi == 'District Registrar' ? 'selected':'' }}  value="District Registrar">District Registrar</option>
                                            <option  {{$data->last_name_of_regi == 'Sub Registrar' ? 'selected':'' }} value="Sub Registrar">Sub Registrar</option>

                                            <option  {{$data->last_name_of_regi == 'Office stuff' ? 'selected':'' }} value="Office stuff">Office stuff</option>
                                        </select>
                                    </div>
                                </div>


                                <div id="Attach_To_Registration" class="col-md-6" @if(!$data->last_name_of_attach) style="display: none" @endif >
                                    <div class="mb-3">
                                        <label for="">Last name</label>
                                        <select  name="last_name_of_attach" class="form-control" id="">
                                            <option  value="">Select Last name</option>
                                            <option {{$data->last_name_of_attach == 'District Registrar' ? 'selected':''}} value="">District Registrar</option>
                                            <option {{$data->last_name_of_attach == 'Sub Registrar' ? 'selected':''}} value="Sub Registrar">Sub Registrar</option>
                                        </select>
                                    </div>
                                </div>




                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="">Appointed</label>
                                        <input type="text" value="{{ $data->appointed }}" name="appointed"
                                            placeholder="Appointed" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="">Current Posting</label>
                                        <input type="text" value="{{ $data->currentPosting }}" name="currentPosting"
                                            placeholder="CurrentPosting" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="">Previous Posting</label>
                                        <input type="text" value="{{ $data->previousposting }}"
                                            name="previousposting" placeholder="PreviousPosting" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="">BloodGroup</label>
                                        <input type="text" value="{{ $data->bloodgroup }}" name="bloodgroup"
                                            placeholder="BloodGroup" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="">Mobile</label>
                                        <input type="number" value="{{ $data->mobile }}" name="mobile"
                                            placeholder="Enter your mobile number" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="">Email</label>
                                        <input type="email" value="{{ $data->email }}" name="email"
                                            placeholder="Enter your Email number" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <center>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </center>
                        </form>
                    </div>
                </div>

                <br>
                <br>


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
                            $('#upazila').html('<option value="">Select Upazila</option>');
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
