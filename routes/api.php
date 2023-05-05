<?php

use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('user-list',[UserController::class,'index']);
Route::get('division/{id?}',[UserController::class,'division']);
Route::get('district/{id?}',[UserController::class,'district']);
Route::get('upazila/{id?}',[UserController::class,'upazila']);


Route::get('district-to-info/{id?}',[UserController::class,'districtToInfo']);
Route::get('batches/{id?}',[UserController::class,'batches']);
