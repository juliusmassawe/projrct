<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            //HODs
            ['role_id' => 4, 'email' => 'hod@ces.com', 'password' => Hash::make('123456789')],
            //Students
            ['role_id' => 2, 'email' => 'wande@gmail.com', 'password' => Hash::make('123456789')],
            ['role_id' => 2, 'email' => 'tito@gmail.com', 'password' => Hash::make('123456789')],
            ['role_id' => 2, 'email' => 'musa@gmail.com', 'password' => Hash::make('123456789')],
            ['role_id' => 2, 'email' => 'jeremiah@gmail.com', 'password' => Hash::make('123456789')],
            ['role_id' => 2, 'email' => 'innocencia@gmail.com', 'password' => Hash::make('123456789')],

            ['role_id' => 2, 'email' => 'neema@gmail.com', 'password' => Hash::make('123456789')],
            ['role_id' => 2, 'email' => 'eden@gmail.com', 'password' => Hash::make('123456789')],
            ['role_id' => 2, 'email' => 'maida@gmail.com', 'password' => Hash::make('123456789')],
            ['role_id' => 2, 'email' => 'dafa@gmail.com', 'password' => Hash::make('123456789')],
            ['role_id' => 2, 'email' => 'ozia@gmail.com', 'password' => Hash::make('123456789')],

            ['role_id' => 2, 'email' => 'daniel@gmail.com', 'password' => Hash::make('123456789')],
            ['role_id' => 2, 'email' => 'fidelis@gmail.com', 'password' => Hash::make('123456789')],
            ['role_id' => 2, 'email' => 'ryoba@gmail.com', 'password' => Hash::make('123456789')],
            ['role_id' => 2, 'email' => 'mariam@gmail.com', 'password' => Hash::make('123456789')],
            ['role_id' => 2, 'email' => 'julius@gmail.com', 'password' => Hash::make('123456789')],


            //Lecturers
            ['role_id' => 3, 'email' => 'sarah@mocu.ac.tz', 'password' => Hash::make('123456789')],
            ['role_id' => 3, 'email' => 'mjema@mocu.ac.tz', 'password' => Hash::make('123456789')],
            ['role_id' => 3, 'email' => 'Matto@mocu.ac.tz', 'password' => Hash::make('123456789')],
            ['role_id' => 3, 'email' => 'Mbilinyi@mocu.ac.tz', 'password' => Hash::make('123456789')],
            ['role_id' => 3, 'email' => 'Madila@mocu.ac.tz', 'password' => Hash::make('123456789')],
            ['role_id' => 3, 'email' => 'patrick@mocu.ac.tz', 'password' => Hash::make('123456789')],
            ['role_id' => 3, 'email' => 'erick@mocu.ac.tz', 'password' => Hash::make('123456789')],
            ['role_id' => 3, 'email' => 'sizya@mocu.ac.tz', 'password' => Hash::make('123456789')],
            ['role_id' => 3, 'email' => 'Adrian@mocu.ac.tz', 'password' => Hash::make('123456789')],
            ['role_id' => 3, 'email' => 'Mustapha@mocu.ac.tz', 'password' => Hash::make('123456789')],
            ['role_id' => 3, 'email' => 'Mariki@mocu.ac.tz', 'password' => Hash::make('123456789')],
            //DVCs
            ['role_id' => 5, 'email' => 'dvca@ces.com', 'password' => Hash::make('123456789')],

            ['role_id' => 2, 'email' => 'brenda@gmail.com', 'password' => Hash::make('123456789')],
            ['role_id' => 2, 'email' => 'vivian@gmail.com', 'password' => Hash::make('123456789')],
            ['role_id' => 2, 'email' => 'salehe@gmail.com', 'password' => Hash::make('123456789')],
            ['role_id' => 2, 'email' => 'zawadi@gmail.com', 'password' => Hash::make('123456789')],

            //QA
            ['role_id' => 6, 'email' => 'qa@mocu.ac.tz', 'password' => Hash::make('123456789')],
        ];

        foreach ($users as $user) {
            User::updateOrCreate(['email' => $user['email']], $user);
        }
    }
}
