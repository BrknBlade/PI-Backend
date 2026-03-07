<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CutTypeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);

//Rutes protegidas por autenticación
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    //Cut Types
    Route::apiResource('/cut_types', CutTypeController::class);

    //Users
    Route::apiResource('/users', UserController::class)->except('store');
    Route::get('/users/{user}/bookings', [UserController::class, 'bookings']);

    //Bookings
    Route::apiResource('/bookings', BookingController::class);
});
