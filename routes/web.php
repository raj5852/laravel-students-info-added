<?php

use App\Http\Controllers\Admin\AddUserController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Models\User;
use App\Models\UserForm;
use Devfaysal\BangladeshGeocode\Models\District;
use Devfaysal\BangladeshGeocode\Models\Division;
use Devfaysal\BangladeshGeocode\Models\Upazila;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/',[LoginController::class,'login'])->middleware('guest')->name('login');
Route::post('/login',[LoginController::class,'loginPost'])->name('loginpost');
Route::get('logout',[LogoutController::class,'index']);


Route::middleware(['auth','isAdmin'])->prefix('admin')->group(function(){
    Route::get('dashboard',[DashboardController::class,'index'])->name('admin.dashboard');
    Route::resource('users',AddUserController::class);
});

Route::middleware(['auth'])->prefix('user')->group(function(){
    Route::get('dashboard',[UserDashboardController::class,'index']);
    Route::post('infoStore',[UserDashboardController::class,'infoStore'])->name('post.userinfo');
    Route::get('delete/{id}',[UserDashboardController::class,'destroy'])->name('userformDelete');
});



Route::get('demo',function(){
    // return Division::all();
    return Upazila::all();

});
