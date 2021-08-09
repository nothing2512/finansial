<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        "id",
        "userId",
        "savingId",
        "type",
        "categoryId",
        "title",
        "description",
        "datetime",
        "status",
        "attachment",
        "price"
    ];
}
