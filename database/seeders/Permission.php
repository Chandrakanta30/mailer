<?php

namespace Database\Seeders;

use App\Models\acl_permission;
use Illuminate\Database\Seeder;

class Permission extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        acl_permission::create([
            'name' => 'ACL permission',
            'guard_name' => 'web',
        ]);
        acl_permission::create([
            'name' => 'Employee Login',
            'guard_name' => 'web',
        ]);
        acl_permission::create([
            'name' => 'SMTP Details',
            'guard_name' => 'web',
        ]);
        acl_permission::create([
            'name' => 'Email',
            'guard_name' => 'web',
        ]);
    }
}
