<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    function login(Request $request)
    {
        if ($request->method() == "GET") return view('login');

        $user = User::query()
            ->where("username", $request->input("username"))
            ->first();

        if ($user == null) return back()->with("error", "Username tidak ditemukan");
        if (!Hash::check($request->input("password"), $user->password))
            return back()->with("error", "Password salah");

        user($user);

        return redirect()->route("dashboard");
    }

    function logout()
    {
        session()->flush();
        return redirect()->route("login");
    }
}
