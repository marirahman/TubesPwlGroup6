<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run()
    {
        // Membuat roles
        $owner = Role::create(['name' => 'owner']);
        $admin = Role::create(['name' => 'admin']);
        $supervisor = Role::create(['name' => 'supervisor']);
        $kasir = Role::create(['name' => 'kasir']);
        $gudang = Role::create(['name' => 'gudang']);

        // Membuat permissions
        Permission::create(['name' => 'manage_cabang']);
        Permission::create(['name' => 'manage_barang']);
        Permission::create(['name' => 'view_laporan']);
        Permission::create(['name' => 'manage_transaksi']);
        Permission::create(['name' => 'manage_stok']);

        // Menambahkan permissions ke roles
        $owner->givePermissionTo(['manage_cabang', 'manage_barang', 'view_laporan', 'manage_transaksi', 'manage_stok']);
        $admin->givePermissionTo(['manage_cabang', 'manage_barang', 'view_laporan', 'manage_transaksi', 'manage_stok']);
        $supervisor->givePermissionTo(['view_laporan', 'manage_transaksi']);
        $kasir->givePermissionTo('manage_transaksi');
        $gudang->givePermissionTo('manage_stok');
    }
}
