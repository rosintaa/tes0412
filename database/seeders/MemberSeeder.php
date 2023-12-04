<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Generate some sample member data
        $members = [
            [
                'name' => 'sinta',
                'password' => bcrypt('secret'),
                'phone_number' => '123456789',
                'birthdate' => '1990-01-01',
                'email' => 'sinta@example.com',
                'gender' => 'male',
                'ktp_number' => '1234567890',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                // Add other fields as needed
            ],
            [
                'name' => 'rosinta',
                'password' => bcrypt('password123'),
                'phone_number' => '987654321',
                'birthdate' => '1992-05-15',
                'email' => 'rosinta@example.com',
                'gender' => 'female',
                'ktp_number' => '0987654321',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                // Add other fields as needed
            ],
            // Add more member data as needed
        ];

        // Insert the member data into the database
        DB::table('members')->insert($members);
    }
}