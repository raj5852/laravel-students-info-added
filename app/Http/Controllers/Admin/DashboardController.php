<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function index(){
        $totalUser = User::where('role',2)->count();
        return view('admin.dashboard',compact('totalUser'));
    }
}
