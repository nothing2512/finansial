<?php

use App\Models\User;
use Illuminate\Http\RedirectResponse;

if (!function_exists("adminlte")) {
    function adminlte($path): string
    {
        return asset("adminlte/$path");
    }
}

if (!function_exists("backError")) {
    function backError($message): RedirectResponse
    {
        session()->flash("error", $message);
        return back();
    }
}

if (!function_exists("user")) {
    function user($user = null)
    {
        if ($user == null) {
            $userId = session()->get("userId", 0);
            return User::query()
                ->where("id", $userId)
                ->first();
        } else {
            session()->put("userId", $user->id);
        }
        return $user;
    }
}
