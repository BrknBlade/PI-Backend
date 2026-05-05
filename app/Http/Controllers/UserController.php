<?php

namespace App\Http\Controllers;

use App\Enums\Roles;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\BookingResource;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use League\CommonMark\Exception\UnexpectedEncodingException;

class UserController extends Controller
{

    public function index()
    {
         if(Auth::user()->cannot('viewAny', User::class)) {
             return response()->json([
                 'message' => "You cannot perform this action"
             ], 401);
         }

        return UserResource::collection(User::all());
    }


    public function show(User $user)
    {
         if(Auth::user()->cannot('view', $user)) {
             return response()->json([
                 'message' => "You cannot perform this action"
             ], 401);
         }

        return new UserResource($user);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
         if(Auth::user()->cannot('update', $user)) {
             return response()->json([
                 'message' => "You cannot perform this action"
             ], 401);
         }

        $user->update($request->validated());

        return response()->json([
            'message' => 'se han actualizado los datos correctamente'
        ]);
    }

    public function destroy(User $user)
    {
         if(Auth::user()->cannot('delete', $user)) {
             return response()->json([
                'message' => "You cannot perform this action"
             ], 401);
         }

        $user->delete();

        return response()->json([
            'message' => 'Se ha eliminado el usuario con exito'
        ]);
    }

    public function bookings(User $user)
    {
        return BookingResource::collection($user->bookings);
    }

    public function employees()
    {
        $employees = User::where('role', Roles::EMPLOYEE)->get();

        return UserResource::collection($employees);
    }
}
