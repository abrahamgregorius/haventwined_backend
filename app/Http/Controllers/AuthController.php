<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => "Invalid field",
                'errors' => $validator->errors()
            ], 422);
        }

        if (!Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {
            return response()->json([
                'message' => "Invalid credentials"
            ], 401);
        }

        $token = auth()->user()->createToken('key')->plainTextToken;

        auth()->user()->update([
            'token' => $token
        ]);

        return response()->json([
            'message' => 'Login successful',
            'accessToken' => $token
        ]);                                                                               
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();
        auth()->user()->logout();
    }
}
