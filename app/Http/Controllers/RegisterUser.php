<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\RoleUser;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterUser extends Controller
{
    public function login(Request $request)
    {
        $user = User::with('role')
            ->where('email', $request->email)
            ->first();

        dd($user);
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response([
                'message' => ['These credentials do not match our records.']
            ], 404);
        }
        $token = $user->createToken('my-app-token')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token,
            "role" => $user->role_id
        ];

        return response($response, 201);
    }
}
