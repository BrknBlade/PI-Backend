<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
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
            'message' => 'Se ha iniciado secion con exito',
        ]);
    }

    public function logout() {
        Auth::guard('web')->logout();

        return response()->json([
            'message' => 'Se ha cerrado secion correctamente'
        ]);
    }
}
