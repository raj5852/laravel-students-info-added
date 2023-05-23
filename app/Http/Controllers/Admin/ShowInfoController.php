<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserForm;
use Illuminate\Http\Request;

class ShowInfoController extends Controller
{
    //
    function index(){
        $users = UserForm::latest()->paginate(10);

        return view('admin.infoshow',compact('users'));
    }

    function accept($id){
        $data = UserForm::find($id);
        $data->status = 'active';
        $data->save();

        return redirect()->back()->with('success','Data Accepted Successfully!');
    }
}
