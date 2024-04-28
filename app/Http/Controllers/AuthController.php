<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    function register(Request $request) {
        $fields = $request->validate([
            "first_name" => "required",
            "last_name" => "required",
            "email_address" => "required|email|unique:users,email_address",
            "username" => "required|unique:users,username",
            "profile_picture" => "nullable|image",
            "password" => "required|confirmed"
        ]);

        $user = User::create([
            "first_name" => $fields["first_name"],
            "last_name" => $fields["last_name"],
            "email_address" => $fields["email_address"],
            "username" => $fields["username"],
            "profile_picture" => $fields["profile_picture"],
            "password" => Hash::make($fields["password"])
        ]);

        $token = $user->createToken(env("AUTH_SECRET", "secret"))->plainTextToken;

        return response()->json([
            "message" => "User has been registered",
            "user" => $user,
            "token" => $token
        ], 201, [], JSON_PRETTY_PRINT);
    }

    function login(Request $request) {
        $fields = $request->validate([
            "username" => "required",
            "password" => "required"
        ]);

        $user = User::where("username", $fields["username"])->first();

        if (!$user) {
            return response()->json([
                "message" => "Username does not exist"
            ], 404, [], JSON_PRETTY_PRINT);
        }
        
        if (!Hash::check($fields["password"], $user->password)) {
            return response()->json([
                "message" => "Password is incorrect"
            ], 401, [], JSON_PRETTY_PRINT);
        }

        $token = $user->createToken(env("AUTH_SECRET", "secret"))->plainTextToken;

        return response()->json([
            "message" => "Logged in successfully",
            "user" => $user,
            "token" => $token
        ], 200, [], JSON_PRETTY_PRINT);
    }

    public function logout() {
        auth()->user()->tokens()->delete();

        return response()->json([
            "message" => "Logged out"
        ], 200, [], JSON_PRETTY_PRINT);
    }
}