<?php

namespace Database\Seeders;

use App\Models\acl_permission;
use App\Models\acl_roles;
use Illuminate\Database\Seeder;

class Role extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        acl_roles::create([
            'name' => 'Super Admin',
            'slug' => 'super-admin',
            'guard_name' => 'web',
        ]);
        acl_roles::create([
            'name' => 'Admin',
            'slug' => 'admin',
            'guard_name' => 'web',
        ]);
        acl_roles::create([
            'name' => 'User',
            'slug' => 'user',
            'guard_name' => 'web',
        ]);

    }
}
