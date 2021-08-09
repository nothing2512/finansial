<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function index()
    {
        $categories = Category::query()->get();
        return view("category")->with([
            "categories" => $categories,
            "title" => "Kategori",
            "menu" => TAB_TRANSACTION_CATEGORY,
            "routeName" => "api.transaction.category"
        ]);
    }

    function store(Request $request, $id = null)
    {
        $payload = $request->all();
        if ($id == null) Category::query()->create($payload);
        else {
            $category = Category::query()->where("id", $id)->first();
            if ($category == null) return backError("Kategori tidak ditemukan");
            $category->fill($payload);
            $category->save();
        }

        return back();
    }

    function destroy(Request $request, $id)
    {
        Category::query()->where("id", $id)->delete();
        return back();
    }
}
