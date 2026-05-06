<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->role === 1
            || $user->role === 2; // Solo Admin
    }

    public function view(User $user, User $model): bool
    {
        return $user->role === 1 // Admin
            || $user->role === 2 // Owner
            || $user->id === $model->id; // El propio usuario
    }

    public function update(User $user, User $model): bool
    {
        return $user->role === 1 // Admin
            || $user->id === $model->id; // El propio usuario
    }

    public function delete(User $user, User $model): bool
    {
        return $user->role === 1; // Solo Admin
    }
}
