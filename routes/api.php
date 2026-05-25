<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\CutTypeController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\UserController;
use App\Models\Booking;
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
    Route::get('/cut_types/total_services', [ CutTypeController::class, 'total_services' ]);
    Route::apiResource('/cut_types', CutTypeController::class);

    //Users
    Route::get('/employees/total', [ UserController::class, 'total_employees' ]);
    Route::apiResource('/employees', EmployeesController::class);
    Route::apiResource('/users', UserController::class);
    Route::get('/users/{user}/bookings', [UserController::class, 'bookings']);

    //Bookings
    Route::get('/bookings/week', [ BookingController::class, 'week_bookings' ]);
    Route::get('/bookings/cancelled', [ BookingController::class, 'cancelled_bookings' ]);
    Route::get('/bookings/accepted', [ BookingController::class, 'accepted_bookings' ]);
    Route::apiResource('/bookings', BookingController::class);

    /* --==== Hour management testing ====-- */
    Route::put('/business/info/update', [ BusinessController::class, 'update' ]);
    Route::patch('/business/info/update', [ BusinessController::class, 'update' ]);
    Route::get('/business/info', [ BusinessController::class, 'business_info' ]);
    Route::get('/business/earnings', [ BusinessController::class, 'earnings' ]);
    Route::get('/business/booked_hours', [ BusinessController::class, 'booked_hours' ]);
});
