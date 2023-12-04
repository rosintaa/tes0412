<?php

namespace Database\Seeders;

use App\Models\Login;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LoginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Login::create(
            [
                'name' => 'administrator',
                'email' => 'administrator@gmail.com',
                'role' => 'administrator',
                'password'  => bcrypt('administrator')
            ]
        );
        Login::create(
            [
                'name' => 'member',
                'email' => 'member@gmail.com',
                'role' => 'member',
                'password'  => bcrypt('member')
            ]
        );
    }
}
