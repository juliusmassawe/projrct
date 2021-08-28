<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ['name' => 'Admin'],
            ['name' => 'Student'],
            ['name' => 'Lecturer'],
            ['name' => 'HOD'],
            ['name' => 'DVC-A'],
            ['name' => 'QA'],
        ];

        foreach ($roles as $role){
            Role::updateOrCreate(['name' => $role['name']], $role);
        }
    }
}
