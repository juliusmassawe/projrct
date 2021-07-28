<?php

namespace Database\Seeders;

use App\Models\Lecturer\Lecturer;
use Illuminate\Database\Seeder;

class LecturerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lecturers = [
            ['user_id' => 17, 'department_id' => 1, 'level_id' => 4, 'work_id' => 'MoCU/ICT/101/02', 'first_name' => 'Sarah', 'last_name' => 'Magoti', 'birth_date' => '01/03/1983', 'phone' => '0786020125', 'gender' => 'F', 'employ_year' => '2002' ],
            ['user_id' => 18, 'department_id' => 1, 'level_id' => 3, 'work_id' => 'MoCU/ICT/115/02', 'first_name' => 'Lucas', 'last_name' => 'Mjema', 'birth_date' => '01/03/1987', 'phone' => '0786030125', 'gender' => 'M', 'employ_year' => '2000' ],
            ['user_id' => 19, 'department_id' => 1, 'level_id' => 6, 'work_id' => 'MoCU/ICT/115/02', 'first_name' => 'George', 'last_name' => 'Matto', 'birth_date' => '01/03/1987', 'phone' => '0786030125', 'gender' => 'M', 'employ_year' => '2000' ],
            ['user_id' => 20, 'department_id' => 1, 'level_id' => 3, 'work_id' => 'MoCU/ICT/115/02', 'first_name' => 'Shedrack', 'last_name' => 'Mbilinyi', 'birth_date' => '01/03/1987', 'phone' => '0786030125', 'gender' => 'M', 'employ_year' => '2000' ],
            ['user_id' => 21, 'department_id' => 1, 'level_id' => 4, 'work_id' => 'MoCU/ICT/115/02', 'first_name' => 'Shedrack', 'last_name' => 'Madila', 'birth_date' => '01/03/1987', 'phone' => '0786030125', 'gender' => 'M', 'employ_year' => '2000' ],
            ['user_id' => 22, 'department_id' => 1, 'level_id' => 3, 'work_id' => 'MoCU/ICT/115/02', 'first_name' => 'Patrick', 'last_name' => 'Mark', 'birth_date' => '01/03/1987', 'phone' => '0786030125', 'gender' => 'M', 'employ_year' => '2000' ],
            ['user_id' => 23, 'department_id' => 1, 'level_id' => 4, 'work_id' => 'MoCU/ICT/115/02', 'first_name' => 'Erick', 'last_name' => 'Samwi', 'birth_date' => '01/03/1987', 'phone' => '0786030125', 'gender' => 'M', 'employ_year' => '2000' ],
            ['user_id' => 24, 'department_id' => 1, 'level_id' => 4, 'work_id' => 'MoCU/ICT/115/02', 'first_name' => 'George', 'last_name' => 'Sizya', 'birth_date' => '01/03/1987', 'phone' => '0786030125', 'gender' => 'M', 'employ_year' => '2000' ],
            ['user_id' => 25, 'department_id' => 1, 'level_id' => 3, 'work_id' => 'MoCU/ICT/115/02', 'first_name' => 'Adrian', 'last_name' => 'Karia', 'birth_date' => '01/03/1987', 'phone' => '0786030125', 'gender' => 'M', 'employ_year' => '2000' ],
            ['user_id' => 26, 'department_id' => 1, 'level_id' => 3, 'work_id' => 'MoCU/ICT/115/02', 'first_name' => 'Mustapha', 'last_name' => 'Mustapha', 'birth_date' => '01/03/1987', 'phone' => '0786030125', 'gender' => 'M', 'employ_year' => '2000' ],
            ['user_id' => 27, 'department_id' => 1, 'level_id' => 4, 'work_id' => 'MoCU/ICT/115/02', 'first_name' => 'Martina', 'last_name' => 'Mariki', 'birth_date' => '01/03/1987', 'phone' => '0786030125', 'gender' => 'F', 'employ_year' => '2000' ],
        ];

        foreach ($lecturers as $lecturer) {
            Lecturer::updateOrCreate(['user_id' => $lecturer['user_id']], $lecturer);
        }
    }
}
