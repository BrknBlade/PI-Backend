<?php

namespace App\Policies;

use App\Models\CutType;
use App\Models\User;

class CutTypePolicy
{
    public function viewAny(User $user): bool
    {
        return $user->role === 2; // Solo Owner
    }

    public function view(User $user, CutType $cutType): bool
    {
        return true; // Cualquiera puede ver un tipo de corte
    }

    public function create(User $user): bool
    {
        return $user->role === 2; // Solo Owner
    }

    public function update(User $user, CutType $cutType): bool
    {
        return $user->role === 2; // Solo Owner
    }

    public function delete(User $user, CutType $cutType): bool
    {
        return $user->role === 2; // Solo Owner
    }
}
