<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin\HeadOfDepartment;

class HeadOfDepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $headsOfDepartment = [
            ['user_id' => 1, 'department_id' => 1, 'fullname' => "Sarah Nyanjara Magoti", 'worker_id' => "ICT-210", 'phone_number' => '743654326', 'gender' => "Female"],
            ['user_id' => 2, 'department_id' => 2, 'fullname' => "John Doe James", 'worker_id' => "HRM-212", 'phone_number' => '746789076', 'gender' => "Male"],
            ['user_id' => 3, 'department_id' => 3, 'fullname' => "Terry Hussein Matumla", 'worker_id' => "LLB-210", 'phone_number' => '687987890', 'gender' => "Male"],
        ];

        foreach ($headsOfDepartment as $headOfDepartment) {
            HeadOfDepartment::updateOrCreate(['fullname' => $headOfDepartment['fullname']], $headOfDepartment);
        }
    }
}
