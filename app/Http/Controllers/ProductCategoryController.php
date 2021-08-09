<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    function index()
    {
        $categories = ProductCategory::query()->get();
        return view("category")->with([
            "categories" => $categories,
            "title" => "Kategori produk",
            "menu" => TAB_PRODUCT_CATEGORY,
            "routeName" => "api.product.category"
        ]);
    }

    function store(Request $request, $id=null)
    {
        $payload = $request->all();
        if ($id == null) ProductCategory::query()->create($payload);
        else {
            $category = ProductCategory::query()->where("id", $id)->first();
            if ($category == null) return backError("Kategori tidak ditemukan");
            $category->fill($payload);
            $category->save();
        }

        return back();
    }

    function destroy(Request $request, $id)
    {
        ProductCategory::query()->where("id", $id)->delete();
        return back();
    }
}
