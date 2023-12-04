<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Generate some sample member data
        $userData = [
            [
              'name' => 'administrator',  
              'email' => 'administrator@gmail.com',
              'role' => 'administrator',
              'password'  => bcrypt('administrator')
            ],
            [
              'name' => 'member',  
              'email' => 'member@gmail.com',
              'role' => 'member',
              'password'  => bcrypt('member')
            ]
            ];

           foreach ($userData as $key => $val) {
            User::create($val);
           }
    }
}