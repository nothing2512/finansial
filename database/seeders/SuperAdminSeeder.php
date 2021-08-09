<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::query()->create([
            "name" => "Super Admin",
            "username" => "sa",
            "password" => "Terseraaah",
            "phone" => "088230354079",
            "photo" => "adminlte/" . LOGO,
            "address" => "Gang Anggrek",
            "role" => SUPERADMIN
        ]);
    }
}
