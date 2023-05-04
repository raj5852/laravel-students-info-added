<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Division;
use App\Models\User;
use App\Models\UserForm;
use Illuminate\Http\Request;
use App\Trait\UserTrait;
use Illuminate\Support\Facades\File;

class DashboardController extends Controller
{
    use UserTrait;

    function index()
    {
        $users = UserForm::latest()->paginate(10);
        $divisions = [];

        return view('users.dashboard', compact('users','divisions'));
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
            'division'=>'required',
            'division'=>'required',
            'upazila'=>'required',
            'batch'=>'required'
        ]);

        $data = $request->all();
        $data['user_id'] = $user->id;



        if ($request->file('profile_img')) {

            $image = $this->fileUpload($request->file('profile_img'), 'profileImage',400,400);
            $data['profile_img'] = $image;
        }


        UserForm::create($data);

        return back()->with('success', 'Information save successfullly');
    }
    function destroy($id){
        $user = UserForm::find($id);
        if($user->profile_img){
            $this->fileDelete($user->profile_img);
        }
         $user->delete();
        return back()->with('success','Deleted successfully');


    }
}
