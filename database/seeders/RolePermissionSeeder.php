<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
// spatie -----------------------------
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

        $role = Role::findByName('admin');
        $role->syncPermissions(['create posts', 'read posts', 'update posts', 'delete posts']);

    }
}
