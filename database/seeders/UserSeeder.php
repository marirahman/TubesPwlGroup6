<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User; //

class UserSeeder extends Seeder
{
    public function run()
{
    User::create([
        'name' => 'Owner User',
        'email' => 'owner@example.com',
        'password' => bcrypt('password'),
        'role' => 'owner',
    ]);

    User::create([
        'name' => 'Supervisor User',
        'email' => 'supervisor@example.com',
        'password' => bcrypt('password'),
        'role' => 'supervisor',
    ]);
}
}
