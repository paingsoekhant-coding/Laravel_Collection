<?php

use App\Http\Controllers\Api\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

//open routes
Route::post('register', [ApiController::class,'register']);
Route::post('login',[ApiController::class,'login']);

//protected routes

Route::middleware('auth:api')->group(function(){

    Route::get('profile', [ApiController::class, 'profile']);
    Route::get('logout',[ApiController::class, 'logout']);

});

//
