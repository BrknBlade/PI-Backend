<?php

namespace App\Policies;

use App\Models\Booking;
use App\Models\User;

class BookingPolicy
{
    public function viewAny(User $user): bool
    {
        return true; // El filtro por rol lo maneja el controller
    }

    public function view(User $user, Booking $booking): bool
    {
        return $user->role === 1 // Admin
            || $user->role === 2 // Owner
            || $user->role === 3 // Employee
            || $booking->user_id === $user->id; // Client: solo las suyas
    }

    public function create(User $user): bool
    {
        return true; // Cualquier autenticado puede crear una cita
    }

    public function update(User $user, Booking $booking): bool
    {
        return $user->role === 1 // Admin
            || $user->role === 2 // Owner
            || $user->role === 3 // Employee
            || $booking->user_id === $user->id; // Client: solo las suyas
    }

    public function delete(User $user, Booking $booking): bool
    {
        return $user->role === 1 // Admin
            || $user->role === 2 // Owner
            || $user->role === 3 // Employee
            || $booking->user_id === $user->id; // Client: solo las suyas
    }
}
