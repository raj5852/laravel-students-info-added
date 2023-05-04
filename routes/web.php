<?php

use App\Http\Controllers\Admin\AddUserController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Models\User;
use App\Models\UserForm;
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
    // $data = '[
    //     {"type":"header","version":"4.8.5","comment":"Export to JSON plugin for PHPMyAdmin"},
    //     {"type":"database","name":"bd_geo_code"},
    //     {"type":"table","name":"divisions","database":"bd_geo_code","data":
    //     [
    //     {"id":"1","name":"Chattagram","bn_name":"চট্টগ্রাম","url":"www.chittagongdiv.gov.bd"},
    //     {"id":"2","name":"Rajshahi","bn_name":"রাজশাহী","url":"www.rajshahidiv.gov.bd"},
    //     {"id":"3","name":"Khulna","bn_name":"খুলনা","url":"www.khulnadiv.gov.bd"},
    //     {"id":"4","name":"Barisal","bn_name":"বরিশাল","url":"www.barisaldiv.gov.bd"},
    //     {"id":"5","name":"Sylhet","bn_name":"সিলেট","url":"www.sylhetdiv.gov.bd"},
    //     {"id":"6","name":"Dhaka","bn_name":"ঢাকা","url":"www.dhakadiv.gov.bd"},
    //     {"id":"7","name":"Rangpur","bn_name":"রংপুর","url":"www.rangpurdiv.gov.bd"},
    //     {"id":"8","name":"Mymensingh","bn_name":"ময়মনসিংহ","url":"www.mymensinghdiv.gov.bd"}
    //     ]
    //     }
    //     ]';

    //     $d =  collect($data);

    //     $mains =  json_decode($data)[2]->data;

    //     foreach($mains  as $dt){
    //         DB::table('divisions')->insert([
    //             'name'=>$dt->name,
    //             'bn_name'=>$dt->bn_name
    //         ]);
    //     }

});
