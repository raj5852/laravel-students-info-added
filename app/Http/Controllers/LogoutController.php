<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LogoutController extends Controller
{
    //
    function index(){

        Session::flush();
        Auth::logout();
        return to_route('login');

    }
}
