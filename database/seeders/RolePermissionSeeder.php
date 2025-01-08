<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'view-dashboard',
            'manage-users',
            'manage-products',
            'manage-transactions',
        ];

        // Buat permission jika belum ada
        foreach ($permissions as $permission) {
            if (!Permission::where('name', $permission)->exists()) {
                Permission::create(['name' => $permission]);
            }
        }

        $roles = [
            'owner' => ['view-dashboard', 'manage-users', 'manage-products', 'manage-transactions'],
            'supervisor' => ['view-dashboard', 'manage-transactions'],
            'cashier' => ['view-dashboard', 'manage-transactions'],
            'warehouse' => ['view-dashboard', 'manage-products'],
        ];

        // Buat role dan beri permission jika belum ada
        foreach ($roles as $role => $rolePermissions) {
            $roleInstance = Role::firstOrCreate(['name' => $role]);

            // Beri permission ke role
            foreach ($rolePermissions as $permission) {
                if (! $roleInstance->hasPermissionTo($permission)) {
                    $roleInstance->givePermissionTo($permission);
                }
            }
        }
    }
}
