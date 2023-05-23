<?php

use App\Http\Controllers\Admin\AddUserController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ShowInfoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Models\Batch;
use App\Models\User;
use App\Models\UserForm;
use Devfaysal\BangladeshGeocode\Models\District;
use Devfaysal\BangladeshGeocode\Models\Division;
use Devfaysal\BangladeshGeocode\Models\Upazila;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;




Route::get('/',[LoginController::class,'login'])->middleware('guest')->name('login');
Route::post('/login',[LoginController::class,'loginPost'])->name('loginpost');
Route::get('logout',[LogoutController::class,'index']);


Route::middleware(['auth','isAdmin'])->prefix('admin')->group(function(){
    Route::get('dashboard',[DashboardController::class,'index'])->name('admin.dashboard');
    Route::resource('users',AddUserController::class);

    Route::get('users-all-info',[ShowInfoController::class,'index'])->name('users.all.info');
    Route::get('user-accept/{id}',[ShowInfoController::class,'accept'])->name('info-accept');
});

Route::middleware(['auth'])->prefix('user')->group(function(){
    Route::get('dashboard',[UserDashboardController::class,'index']);
    Route::post('infoStore',[UserDashboardController::class,'infoStore'])->name('post.userinfo');
    Route::post('infoStoreUpdate/{id}',[UserDashboardController::class,'infoUpdate'])->name('post.userinfo.update');
    Route::get('delete/{id}',[UserDashboardController::class,'destroy'])->name('userformDelete');
    Route::get('get-districts',[UserDashboardController::class,'getDistricts']);
    Route::get('get-upazilas',[UserDashboardController::class,'getUpazilas']);

    Route::get('info/{id}',[UserDashboardController::class,'edit'])->name('infoedit');

});



Route::get('demo',function(){
    return view('users.test');
});
