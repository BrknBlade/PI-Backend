<?php

namespace App\Policies;

use App\Enums\Roles;
use App\Models\Employees;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class EmployeesPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Employees $employees): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Employees $employees): bool
    {
        return $employees->role === 2;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Employees $employees): bool
    {
        return $employees->role === 2 || $employees === 1;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Employees $employees): bool
    {
        return $employees === 2;
    }

    /**
     * Determine whether the user can restore the model.
     */
    // public function restore(User $user, Employees $employees): bool
    // {
    //     return false;
    // }

    // /**
    //  * Determine whether the user can permanently delete the model.
    //  */
    // public function forceDelete(User $user, Employees $employees): bool
    // {
    //     return false;
    // }
}
