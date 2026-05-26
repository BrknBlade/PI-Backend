<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function login(AuthRequest $request) {
        if(!Auth::attempt($request->validated())) {
            return response()->json([
                'message' => 'failed to login'
            ]);
        }

        return response()->json([
            'message' => 'Se ha iniciado sesion con exito',
            'user_id' => Auth::user()->id
        ]);
    }

    public function logout(Request $request) {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->json([
            'message' => 'Se ha cerrado secion correctamente'
        ]);
    }

    public function register(RegisterRequest $request) {
        $validated = $request->validated();

        $validated['role'] = 4;

        $user = User::create($validated);

        return new UserResource($user);
    }
}
