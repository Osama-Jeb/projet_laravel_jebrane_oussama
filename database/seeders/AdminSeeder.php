<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            "name" => "Admin",
            "email" => "admin@admin.com",
            "password" => "adminadmin",
        ])->assignRole(['admin', 'webmaster']);

        User::create([
            "name" => "web",
            "email" => "web@web.com",
            "password" => "password",
        ])->assignRole("webmaster");
    }
}
