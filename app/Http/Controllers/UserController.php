<?php

namespace App\Http\Controllers;

use App\Helpers\Uploader;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function index(Request $request, $role)
    {
        switch ($role) {
            case CUSTOMER: $title = "pelanggan"; break;
            case DEBTOR: $title = "debitur"; break;
            default: $title = "admin";
        }

        $users = User::query()
            ->where("role", $role)
            ->get();

        return view("user")->with([
            "title" => $title,
            "menu" => $role,
            "role" => $role,
            "users" => $users
        ]);
    }

    function store(Request $request, $id=null)
    {
        $payload = $request->all();
        $photo = $request->file("photo");
        if ($photo != null) {
            $photo = Uploader::photo($photo);
            if (!$photo->status) return response()->json($photo);
            $payload["photo"] = $photo->data;
        }

        if ($id == null) {
            if ($payload["role"] == ADMIN) {
                $user = User::query()->where("username", $payload["username"])->first();
                if ($user != null) return backError("Username telah terdaftar");
            }
            User::query()->create($payload);
        } else {
            unset($payload['username']);
            $user = User::query()->where("id", $id)->first();
            if ($user == null) return backError("User tidak ditemukan");
            $user->fill($payload);
            $user->save();
        }

        return back();
    }

    function destroy(Request $request, $id) {
        User::query()->where("id", $id)->delete();
        return back();
    }

    function profile(Request $request)
    {

    }
}
