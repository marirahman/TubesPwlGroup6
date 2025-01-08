<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run()
    {
        Role::create(['name' => 'supervisor']);
        Role::create(['name' => 'cashier']);
        Role::create(['name' => 'warehouse']);
        Role::create(['name' => 'manager']);
    }
}
