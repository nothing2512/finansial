<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Hash;

class User extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "id",
        "name",
        "username",
        "password",
        "phone",
        "photo",
        "address",
        "role"
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($user) {
            $user->password = Hash::make($user->password);
        });

        static::updating(function ($user) {
            if ($user->isDirty("password")) $user->password = Hash::make($user->password);
        });
    }
}
