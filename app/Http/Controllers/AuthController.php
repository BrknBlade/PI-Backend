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

        $token = Auth::user()->createToken('Token para ' . Auth::user()->email);

        return response()->json([
            'message' => 'Se ha iniciado secion con exito',
            'token' => $token->plainTextToken,
            'user_id' => Auth::user()->id
        ]);
    }

    public function logout() {
        Auth::guard('web')->logout();

        return response()->json([
            'message' => 'Se ha cerrado secion correctamente'
        ]);
    }
}
