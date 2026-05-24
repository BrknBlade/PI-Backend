<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\CutTypeController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);

//Rutes protegidas por autenticación
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/user', function(Request $request) {
        return $request->user();
    });

    //Cut Types
    Route::apiResource('/cut_types', CutTypeController::class);

    //Users
    Route::apiResource('/users', UserController::class)->except('store');
    Route::get('/users/{user}/bookings', [UserController::class, 'bookings']);
    // Route::get('/employees', [ UserController::class, 'employees' ]);

    //Employees
    Route::apiResource('/employees', EmployeesController::class);

    //Bookings
    Route::apiResource('/bookings', BookingController::class);

    /* --==== Hour management testing ====-- */
    Route::get('/business/info', [ BusinessController::class, 'business_info' ]);
    Route::get('/business/booked_hours', [ BusinessController::class, 'booked_hours' ]);
});
