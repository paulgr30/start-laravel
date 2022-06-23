<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Visitant']);


        Permission::create(['name' => 'admin.dashboard'])->syncRoles([$role1]);


        Permission::create(['name' => 'users.all'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'users.show'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'users.bycriteria'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'users.store'])->syncRoles([$role1]);
        Permission::create(['name' => 'users.update'])->syncRoles([$role1]);
        Permission::create(['name' => 'users.destroy'])->syncRoles([$role1]);
    }
}
