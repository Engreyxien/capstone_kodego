<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUsers(Request $request)
    {
        $users = User::all();
        return response()->json($users);
    }

    public function show(User $user)
    {
        return response()->json($user);
    }

    public function update(Request $request, User $user)
    {
        $fields = $request->validate([
            "username" => "required",
            "email_address" => "required|email",
        ]);
    }
    public function store(Request $request)
    {
        $fields = $request->validate([
            "username" => "required",
            "email_address" => "required|email",
        ]);
    }
}
