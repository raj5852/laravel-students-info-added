<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Batch;
use App\Models\Designation;
use App\Models\User;
use App\Models\UserForm;
use Illuminate\Http\Request;
use App\Trait\UserTrait;
use Devfaysal\BangladeshGeocode\Models\District;
use Devfaysal\BangladeshGeocode\Models\Division;
use Devfaysal\BangladeshGeocode\Models\Upazila;
use Illuminate\Support\Facades\File;

class DashboardController extends Controller
{
    use UserTrait;

    function index()
    {
        $users = UserForm::with(['divisiondata:id,name', 'districtdata:id,name', 'upaziladata:id,name', 'batchdata:id,name', 'designationdata:id,name'])->latest()->paginate(10);
        $divisions = Division::all();
        $batches = Batch::all();
        $designations = Designation::all();

        return view('users.dashboard', compact('users', 'divisions', 'batches', 'designations'));
    }
    function infoStore(Request $request)
    {

        $user = auth()->user();

        $data = $request->all();
        $data['user_id'] = $user->id;



        if ($request->file('profile_img')) {

            $image = $this->fileUpload($request->file('profile_img'), 'profileImage', 400, 400);
            $data['profile_img'] = $image;
        }


        UserForm::create($data);

        return back()->with('success', 'Information save successfullly');
    }

    function infoUpdate(Request $request, $id)
    {
        $user = auth()->user();
        $form = UserForm::find($id);
        $form->name = $request->name;
        $form->educational_qualification = $request->educational_qualification;
        $form->date_of_birth = $request->date_of_birth;
        $form->district = $request->district;
        $form->working_from = $request->working_from;
        $form->appointed = $request->appointed;
        $form->currentPosting = $request->currentPosting;
        $form->previousposting = $request->previousposting;
        $form->bloodgroup = $request->bloodgroup;
        $form->mobile = $request->mobile;
        $form->email = $request->email;
        $form->division = $request->division;
        $form->upazila = $request->upazila;
        $form->batch = $request->batch;
        $form->new_section = $request->new_section;
        $form->designation = $request->designation;
        $form->home_district = $request->home_district;

        if ($request->designation == '1') {
            $form->last_name_of_regi = $request->last_name_of_regi;
            $form->last_name_of_attach = '';
        } elseif($request->designation == '4') {
            $form->last_name_of_attach = $request->last_name_of_attach;
            $form->last_name_of_regi = '';
        }else{
            $form->last_name_of_attach = '';
            $form->last_name_of_regi = '';
        }



        if ($request->file('profile_img')) {
            if (File::exists($form->profile_img)) {
                File::delete($form->profile_img);
            }

            $image = $this->fileUpload($request->file('profile_img'), 'profileImage', 400, 400);
            $form->profile_img = $image;
        }

        $form->save();

        return back()->with('success', 'Information save successfullly');
    }
    function destroy($id)
    {
        $user = UserForm::find($id);
        if ($user->profile_img) {
            $this->fileDelete($user->profile_img);
        }
        $user->delete();
        return back()->with('success', 'Deleted successfully');
    }
    function getDistricts(Request $request)
    {
        $districts = District::where('division_id', $request->division_id)->pluck('name', 'id');
        return response()->json($districts);
    }
    function getUpazilas(Request $request)
    {
        $upazilas = Upazila::where('district_id', $request->district_id)->pluck('name', 'id');

        return response()->json($upazilas);
    }
    function edit($id)
    {
        $UserForm = UserForm::find($id);
        if ($UserForm) {
            $data =  $UserForm->load(['divisiondata:id,name', 'districtdata:id,name', 'upaziladata:id,name', 'batchdata:id,name', 'designationdata:id,name']);

            $divisions = Division::all();
            $district = District::where('division_id', $data->divisiondata->id)->get();

            $upzila = Upazila::where('district_id', $data->districtdata->id)->get();


            $batches = Batch::all();
            $designations = Designation::all();

            return view('users.edit', compact('divisions', 'district', 'upzila', 'batches', 'designations', 'data'));
        } else {
            return "Not found";
        }
    }
}
