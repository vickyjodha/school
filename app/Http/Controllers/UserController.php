<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\RoleUser;
use App\Models\User as UserModdel;
use Illuminate\Contracts\Session\Session;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $user = UserModdel::with('roles')->where('email', $request->email)
            ->first();


        if (!$user || !Hash::check($request->password, $user->password)) {
            return response([
                'message' => ['These credentials do not match our records.']
            ], 404);
        }
        $token = $user->createToken('my-app-token')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token,
            'role' => $user->roles[0]->id
        ];
        return redirect()->to('dashboard');
        // return redirect()->route('dsh');
        // return response($response, 201);
        // return response($response, 201);
    }
    public function register(RegisterRequest $request)
    {
        $user = new UserModdel();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->user_role = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        RoleUser::firstOrCreate([
            'user_id'    => $user->id,
            'role_id'    => $request->role ?? 2,
        ]);
        // Session::flash('success', 'Registered Successfully');
        return redirect()->to('login');
    }

    public function dashboard()
    {
        $user = User::all();
        return $user;
    }
}
