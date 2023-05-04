<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserForm;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function index(){
        return UserForm::all();
    }
}
