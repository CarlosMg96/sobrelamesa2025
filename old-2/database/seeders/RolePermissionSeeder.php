<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $admin = Role::where('name', 'Admin')->first();
        $permissions = Permission::all();
        $admin->syncPermissions($permissions);

        $partner = Role::where('name', 'Partner')->first();
        $permsissions = Permission::whereNot('module_name', 'like','%Meets%')->get();
        $partner->syncPermissions($permsissions);
    }
}
