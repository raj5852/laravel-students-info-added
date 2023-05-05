<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Batch;
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
        $users = UserForm::with(['divisiondata:id,name', 'districtdata:id,name', 'upaziladata:id,name','batchdata:id,name'])->latest()->paginate(10);
        $divisions = Division::all();
        $batches = Batch::all();

        return view('users.dashboard', compact('users', 'divisions', 'batches'));
    }
    function infoStore(Request $request)
    {

        $user = auth()->user();
        $request->validate([
            'name' => 'required',
            'educational_qualification' => 'required',
            'date_of_birth' => 'required',
            'district' => 'required',
            'working_from' => 'required',
            'appointed' => 'required',
            'currentPosting' => 'required',
            'previousposting' => 'required',
            'bloodgroup' => 'required',
            'mobile' => 'required',
            'email' => 'required',
            'profile_img' => 'required',
            'division' => 'required',
            'division' => 'required',
            'upazila' => 'required',
            'batch' => 'required'
        ]);

        $data = $request->all();
        $data['user_id'] = $user->id;



        if ($request->file('profile_img')) {

            $image = $this->fileUpload($request->file('profile_img'), 'profileImage', 400, 400);
            $data['profile_img'] = $image;
        }


        UserForm::create($data);

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
}
