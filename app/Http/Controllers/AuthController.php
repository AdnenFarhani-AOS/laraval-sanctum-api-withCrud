<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // Validate the request values
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|unique:users,email',
            'password' => 'required|string|confirmed'
        ]);

        // Create User
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password'])
        ]);

        // Create Token
        $token = $user->createToken('myapp-token')->plainTextToken;

        // Response
        $response = [
            'user' => $user ,
            'token' => $token
        ];
        return [$response , 201];
    }

    public function login(Request $request)
    {
        // Validate the request values
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);

        // Get the User
        $user = User::where('email', $request['email'])->first();

        // Check user
        if (!$user || !Hash::check($request['password'], $user->password)) {
            return response(['message'=> 'Wrong account information'], 401);
        }

        // Create Token
        $token = $user->createToken('myapp-token')->plainTextToken;

        // Response
        $response = [
            'user' => $user ,
            'token' => $token
        ];
        return [$response , 201];
    }

    public function logout(Request $request)
    {
        Auth()->user()->tokens()->delete();
        return [
            'msg' => 'logged out'
        ];
    }
}
