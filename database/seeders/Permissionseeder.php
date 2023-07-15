<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class Permissionseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name'=>'create posts']);
        Permission::create(['name'=>'read posts']);
        Permission::create(['name'=>'update posts']);
        Permission::create(['name'=>'delete posts']);
    }
}
