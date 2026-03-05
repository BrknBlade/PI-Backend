<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CutTypeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [ AuthController::class, 'login' ]);

Route::middleware('auth:sanctum')->group(function() {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::apiResource('/cut_types', CutTypeController::class);
    Route::apiResource('/users', UserController::class)->except('store');

    /*
     * TODO: Falta el BookingController, esta logica es responsabilidad de dicho
     * controlador puesto que se genera un recurso de Booking
     *
     * Route::get('/users/{user}/bookings', [ BookinkgController::class, 'bookings' ]);
     */
});

