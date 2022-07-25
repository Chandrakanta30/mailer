<?php

namespace Database\Seeders;

use App\Models\AdminLogin;
use App\Models\EmployeeLogin;
use Illuminate\Database\Seeder;

class LoginUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EmployeeLogin::create([
            'name' => 'Subhankar Dutta',
            'user_emailaddress' => 'subhankar0810@gmail.com',
            'password' => password_hash('Sub@2019', PASSWORD_DEFAULT),
            'roleid' => 1,
        ]);
    }
}
