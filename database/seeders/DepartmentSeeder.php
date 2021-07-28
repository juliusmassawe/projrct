<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin\Department;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departments = [
            ['fullname' => 'Information Communication Technology', 'abbreviation' => 'ICT', 'faculty' => 'FBIS'],
            ['fullname' => 'Law', 'abbreviation' => 'LLB', 'faculty' => 'FCCD'],
            ['fullname' => 'Human Resource Management', 'abbreviation' => 'HRM', 'faculty' => 'FBIS'],
            ['fullname' => 'Procurement', 'abbreviation' => 'PCM', 'faculty' => 'FCCD'],
            ['fullname' => 'Accounts and Finance', 'abbreviation' => 'AF', 'faculty' => 'FBIS'],
        ];

        foreach ($departments as $department){
            Department::updateOrCreate(['abbreviation' => $department['abbreviation']], $department);
        }
    }
}
