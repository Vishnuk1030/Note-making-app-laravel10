<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ApiController extends Controller
{
    public function login()
    {
        $user = User::where('email', request('email'))->first();
        if (Hash::check(request('password'), $user->password)) {
            $token = $user->createToken('mobile-App')->plainTextToken;

            return response()->json([
                'token' => $token,
                'message' => 'credentials are valid,Login success..!',
                'status' => 200,
            ]);
        } else {
            return response()->json([
                'message' => 'The password is invalid,login Fialed..!',
                'status' => 404,
            ]);
        }
    }
    public function getProfile()
    {
        $userId = auth()->user()->id;
        $user = User::find($userId);
        return response()->json([
            'status' => 200,
            'data' => $user,
            'message' => 'User profile got it.!'
        ]);
    }

    public function logout()
    {
        $userId = auth()->user()->id;
        $user = User::find($userId);
        $user->tokens()->delete();
        return response()->json([
            'status' => 200,
            'message' => 'user Logged out successfully.!'
        ]);
    }
}
