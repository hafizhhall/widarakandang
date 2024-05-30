<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;

class UserRolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::beginTransaction();
        try {
            //code...
            $admin = User::create([
                'name' => 'admin',
                'email' => 'banyu@gmail.com',
                'role' => 'admin',
                'password' => bcrypt('password')
            ]);

            $pemilik = User::create([
                'name' => 'pemilik',
                'email' => 'athallah@gmail.com',
                'role' => 'pemilik',
                'password' => bcrypt('password')
            ]);

            $pelanggan = User::create([
                'name' => 'pelanggan',
                'email' => 'widianto@gmail.com',
                'role' => 'pelanggan',
                'password' => bcrypt('password')
            ]);

            $role_admin = Role::create(['name' => 'admin']);
            $role_pemilik = Role::create(['name' => 'pemilik']);
            $role_pelanggan = Role::create(['name' => 'pelanggan']);

            $permission = Permission::create(['name' => 'read role']);
            $permission = Permission::create(['name' => 'create role']);
            $permission = Permission::create(['name' => 'update role']);
            $permission = Permission::create(['name' => 'delete role']);

            $permission = Permission::create(['name' => 'read artikel']);
            $permission = Permission::create(['name' => 'create artikel']);
            $permission = Permission::create(['name' => 'update artikel']);
            $permission = Permission::create(['name' => 'delete artikel']);

            $permission = Permission::create(['name' => 'read katalog']);
            $permission = Permission::create(['name' => 'create katalog']);
            $permission = Permission::create(['name' => 'update katalog']);
            $permission = Permission::create(['name' => 'delete katalog']);

            $permission = Permission::create(['name' => 'read entry']);
            $permission = Permission::create(['name' => 'create entry']);
            $permission = Permission::create(['name' => 'update entry']);
            $permission = Permission::create(['name' => 'delete entry']);

            $permission = Permission::create(['name' => 'read output']);
            $permission = Permission::create(['name' => 'create output']);
            $permission = Permission::create(['name' => 'update output']);
            $permission = Permission::create(['name' => 'delete output']);

            $admin->givePermissionTo(
                'read role',
                'read artikel',
                'read katalog',
                'read entry',
                'read output'
            );
            $admin->givePermissionTo(
                'create role',
                'create artikel',
                'create katalog',
                'create entry',
                'create output'
            );
            $admin->givePermissionTo(
                'update role',
                'update artikel',
                'update katalog',
                'update entry',
                'update output'
            );

            $pemilik->givePermissionTo(
                'read artikel',
                'read entry',
                'read output'
            );
            $pemilik->givePermissionTo(
                'create artikel'
            );
            $pemilik->givePermissionTo(
                'update artikel'
            );
            $pemilik->givePermissionTo(
                'delete artikel'
            );

            $admin->assignRole('admin');
            $pemilik->assignRole('pemilik');
            $pelanggan->assignRole('pelanggan');
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
        }
    }
}
