<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Создание прав
        Permission::create(['name' => 'manage users']);
        Permission::create(['name' => 'manage tests']);
        Permission::create(['name' => 'view materials']);
        Permission::create(['name' => 'create materials']);
        Permission::create(['name' => 'view tests']);
        Permission::create(['name' => 'take tests']);

        // Создание ролей и назначение прав
        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->givePermissionTo(Permission::all());

        $teacherRole = Role::create(['name' => 'teacher']);
        $teacherRole->givePermissionTo(['create materials', 'manage tests', 'view materials']);

        $studentRole = Role::create(['name' => 'student']);
        $studentRole->givePermissionTo(['view materials', 'view tests', 'take tests']);

        // Создание временной роли "unverified" без прав
        Role::create(['name' => 'unverified']);
    }
}
