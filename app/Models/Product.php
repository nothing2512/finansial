<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "id",
        "categoryId",
        "name",
        "description",
        "photo",
        "purchasePrice",
        "sellPrice",
        "product",
        "discount",
        "discount_type",
        "stock"
    ];
}
