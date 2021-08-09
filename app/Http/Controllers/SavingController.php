<?php

namespace App\Http\Controllers;

use App\Models\Saving;
use Illuminate\Http\Request;

class SavingController extends Controller
{
    function index()
    {
        $savings = Saving::query()->get();
        return view("saving")->with(["savings" => $savings]);
    }

    function store(Request $request, $id=null)
    {
        $payload = $request->all();
        $payload['balance'] = str_replace(",", "", $payload["balance"]);

        if ($id == null) Saving::query()->create($payload);
        else {
            $saving = Saving::query()->where("id", $id)->first();
            if ($saving == null) return backError("Penyimpanan tidak ditemukan");
            $saving->fill($payload);
            $saving->save();
        }
        return back();
    }

    function destroy(Request $request, $id)
    {
        Saving::query()->where("id", $id)->delete();
        return back();
    }
}
