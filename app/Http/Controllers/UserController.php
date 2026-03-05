<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /* if(Auth::user()->cannot('viewAny', User::class)) { */
        /*     return response()->json([ */
        /*         'message' => "You cannot perform this action" */
        /*     ], 401); */
        /* } */

        return UserResource::collection(User::all());
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        /* if(Auth::user()->cannot('view', $user)) { */
        /*     return response()->json([ */
        /*         'message' => "You cannot perform this action" */
        /*     ], 401); */
        /* } */

        return new UserResource($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        /* if(Auth::user()->cannot('update', $user)) { */
        /*     return response()->json([ */
        /*         'message' => "You cannot perform this action" */
        /*     ], 401); */
        /* } */

        $user->update($request->validated());

        return response()->json([
            'message' => 'se han actualizado los datos correctamente'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        /* if(Auth::user()->cannot('delete', $user)) { */
        /*     return response()->json([ */
        /*         'message' => "You cannot perform this action" */
        /*     ], 401); */
        /* } */

        $user->delete();

        return response()->json([
            'message' => 'Se ha eliminado el usuario con exito'
        ]);
    }

    public function bookings(User $user) {
        /*
        * TODO: Falta crear el recurso de bookins y devolver una coleccion de los bookings
        * del usuario haciendo uso de la relacion bookings
        */
    }
}
