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
            "profile_pic" => "nullable|image",
            "password" => "required|confirmed"
        ]);

        $user = User::create([
            "first_name" => $fields["first_name"],
            "last_name" => $fields["last_name"],
            "email_address" => $fields["email_address"],
            "username" => $fields["username"],
            "profile_pic" => $fields["profile_pic"],
            "password" => Hash::make($fields["password"])
        ]);

        $token = $user->createToken("secret")->plainTextToken;

        return response()->json([
            "message" => "User has been registered",
            "user" => $user,
            "token" => $token
        ], 201, [], JSON_PRETTY_PRINT);
    }

    function login(Request $request) {
        $fields = $request->validate([
            "username" => "required",
            "email_address" => "required|email",
            "password" => "required"
        ]);

        $user = User::where("email_address", $fields["email_address"])->first();

        if (!$user) {
            return response()->json([
                "message" => "Email does not exist"
            ], 404, [], JSON_PRETTY_PRINT);
        }

        $token = $user->createToken("secret")->plainTextToken;

        return response()->json([
            "message" => "Logged in successfully",
            "user" => $user,
            "token" => $token
        ], 200, [], JSON_PRETTY_PRINT);
    }

    function logout() {
        auth()->user()->tokens()->delete();

        return response()->json([
            "message" => "Logged out"
        ], 200, [], JSON_PRETTY_PRINT);
    }
}