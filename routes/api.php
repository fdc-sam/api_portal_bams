<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\JobController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\TrafficControlCrotroller;
use App\Http\Controllers\API\CompanyController;
use App\Http\Controllers\API\SecurityController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::post("register", [AuthController::class, "register"]);
Route::post("login", [AuthController::class, "login"]);
Route::post("logout", [AuthController::class, "logout"]);

Route::middleware("auth:sanctum")->group(function(){

    Route::apiResource('/trafic_control', TrafficControlCrotroller::class);
    Route::apiResource('/company', CompanyController::class);
    Route::apiResource('/security_company', SecurityController::class);
    
});