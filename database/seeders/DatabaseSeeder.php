<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            DepartmentSeeder::class,
            UserSeeder::class,
            LevelSeeder::class,
            HeadOfDepartmentSeeder::class,
            ProgrammeSeeder::class,
            CourseSeeder::class,
            LecturerSeeder::class,
            StudentSeeder::class,
        ]);
    }
}
