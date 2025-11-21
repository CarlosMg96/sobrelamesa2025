<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $roles = array(
            array('id' => '1', 'name' => 'Partner', 'guard_name' => 'web', 'created_at' => '2024-12-09 17:18:22', 'updated_at' => '2024-12-09 17:18:22'),
            array('id' => '2', 'name' => 'Admin', 'guard_name' => 'web', 'created_at' => '2024-12-09 17:20:58', 'updated_at' => '2024-12-09 17:20:58'),
            array('id' => '3', 'name' => 'Associate', 'guard_name' => 'web', 'created_at' => '2024-12-09 17:21:26', 'updated_at' => '2024-12-09 17:21:26'),
            array('id' => '4', 'name' => 'General', 'guard_name' => 'web', 'created_at' => '2024-12-09 17:21:50', 'updated_at' => '2024-12-09 17:21:50'),
            array('id' => '5', 'name' => 'Intern', 'guard_name' => 'web', 'created_at' => '2024-12-09 17:22:15', 'updated_at' => '2024-12-09 17:22:15'),
            array('id' => '6', 'name' => 'Counsel', 'guard_name' => 'web', 'created_at' => '2024-12-09 17:22:39', 'updated_at' => '2024-12-09 17:22:39'),
            array('id' => '7', 'name' => 'Consultant', 'guard_name' => 'web', 'created_at' => '2024-12-09 17:23:03', 'updated_at' => '2024-12-09 17:23:03'),
            array('id' => '8', 'name' => 'Other', 'guard_name' => 'web', 'created_at' => '2024-12-09 17:23:03', 'updated_at' => '2024-12-09 17:23:03'),
            array('id' => '9', 'name' => 'HR', 'guard_name' => 'web', 'created_at' => '2024-12-09 17:23:03', 'updated_at' => '2024-12-09 17:23:03'),
            array('id' => '10', 'name' => 'Kitchen', 'guard_name' => 'web', 'created_at' => '2024-12-09 17:23:03', 'updated_at' => '2024-12-09 17:23:03'),
        );
        foreach ($roles as $role) {
            \Spatie\Permission\Models\Role::updateOrCreate(
                ['name' => $role['name']],
                [
                    'name' => $role['name'],
                    'guard_name' => $role['guard_name'],
                    'created_at' => $role['created_at'],
                    'updated_at' => $role['updated_at']
                ]
            );
        }
    }
}
