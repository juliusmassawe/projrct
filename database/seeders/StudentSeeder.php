<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Student\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $students = [
            //CIT Students
            ['user_id' => 2, 'programme_id' => 1, 'student_id' => 'MoCU/CIT/102/18', 'first_name' => 'Wilson', 'last_name' => 'Wande', 'birth_date' => '05/05/1997', 'phone' => '0786020125', 'gender' => 'F', 'enroll_year' => '2020', 'current_academic_year' => '2020/2021', 'current_semester' => 2],
            ['user_id' => 3, 'programme_id' => 1, 'student_id' => 'MoCU/CIT/190/18', 'first_name' => 'Tito', 'last_name' => 'Jackson', 'birth_date' => '02/08/1998', 'phone' => '0786020425', 'gender' => 'M', 'enroll_year' => '2020', 'current_academic_year' => '2020/2021', 'current_semester' => 2],
            ['user_id' => 4, 'programme_id' => 1, 'student_id' => 'MoCU/CIT/360/18', 'first_name' => 'Musa', 'last_name' => 'Luhwavi', 'birth_date' => '04/05/1996', 'phone' => '0686020425', 'gender' => 'M', 'enroll_year' => '2020', 'current_academic_year' => '2020/2021', 'current_semester' => 2],
            ['user_id' => 5, 'programme_id' => 1, 'student_id' => 'MoCU/CIT/123/18', 'first_name' => 'Jeremia', 'last_name' => 'Gereta', 'birth_date' => '12/05/1996', 'phone' => '0686820425', 'gender' => 'M', 'enroll_year' => '2020', 'current_academic_year' => '2020/2021', 'current_semester' => 2],
            ['user_id' => 6, 'programme_id' => 1, 'student_id' => 'MoCU/CIT/456/18', 'first_name' => 'Innocencia', 'last_name' => 'Mataba', 'birth_date' => '18/04/1996', 'phone' => '0776020425', 'gender' => 'F', 'enroll_year' => '2020', 'current_academic_year' => '2020/2021', 'current_semester' => 2],

            ['user_id' => 7, 'programme_id' => 2, 'student_id' => 'MoCU/DBICT/326/18', 'first_name' => 'Neema', 'last_name' => 'Julius', 'birth_date' => '18/04/1996', 'phone' => '0776020425', 'gender' => 'F', 'enroll_year' => '2019', 'current_academic_year' => '2020/2021', 'current_semester' => 4],
            ['user_id' => 8, 'programme_id' => 2, 'student_id' => 'MoCU/DBICT/326/18', 'first_name' => 'Eden', 'last_name' => 'Shoo', 'birth_date' => '18/04/1996', 'phone' => '0776020425', 'gender' => 'M', 'enroll_year' => '2020', 'current_academic_year' => '2020/2021', 'current_semester' => 4],
            ['user_id' => 9, 'programme_id' => 2, 'student_id' => 'MoCU/DBICT/326/18', 'first_name' => 'Maida', 'last_name' => 'Nyoni', 'birth_date' => '18/04/1996', 'phone' => '0776020425', 'gender' => 'F', 'enroll_year' => '2019', 'current_academic_year' => '2020/2021', 'current_semester' => 4],
            ['user_id' => 10, 'programme_id' => 2, 'student_id' => 'MoCU/DBICT/326/18', 'first_name' => 'Dafa', 'last_name' => 'Dafa', 'birth_date' => '18/04/1996', 'phone' => '0776020425', 'gender' => 'M', 'enroll_year' => '2020', 'current_academic_year' => '2020/2021', 'current_semester' => 4],
            ['user_id' => 11, 'programme_id' => 2, 'student_id' => 'MoCU/DBICT/326/18', 'first_name' => 'Ozia', 'last_name' => 'Mwangoya', 'birth_date' => '18/04/1996', 'phone' => '0776020425', 'gender' => 'M', 'enroll_year' => '2019', 'current_academic_year' => '2020/2021', 'current_semester' => 4],

            ['user_id' => 12, 'programme_id' => 3, 'student_id' => 'MoCU/BScBICT/326/18', 'first_name' => 'Daniel', 'last_name' => 'Emmanuel', 'birth_date' => '18/04/1996', 'phone' => '0776020425', 'gender' => 'M', 'enroll_year' => '2018', 'current_academic_year' => '2020/2021', 'current_semester' => 6],
            ['user_id' => 13, 'programme_id' => 3, 'student_id' => 'MoCU/BScBICT/326/18', 'first_name' => 'Fidelis', 'last_name' => 'Wilfred', 'birth_date' => '18/04/1996', 'phone' => '0776020425', 'gender' => 'M', 'enroll_year' => '2018', 'current_academic_year' => '2020/2021', 'current_semester' => 6],
            ['user_id' => 14, 'programme_id' => 3, 'student_id' => 'MoCU/BScBICT/326/18', 'first_name' => 'Ryoba', 'last_name' => 'Binagwa', 'birth_date' => '18/04/1996', 'phone' => '0776020425', 'gender' => 'M', 'enroll_year' => '2018', 'current_academic_year' => '2020/2021', 'current_semester' => 6],
            ['user_id' => 15, 'programme_id' => 3, 'student_id' => 'MoCU/BScBICT/326/18', 'first_name' => 'Mariam', 'last_name' => 'Bubeshi', 'birth_date' => '18/04/1996', 'phone' => '0776020425', 'gender' => 'F', 'enroll_year' => '2018', 'current_academic_year' => '2020/2021', 'current_semester' => 6],
            ['user_id' => 16, 'programme_id' => 3, 'student_id' => 'MoCU/BScBICT/326/18', 'first_name' => 'Julius', 'last_name' => 'Massawe', 'birth_date' => '18/04/1996', 'phone' => '0776020425', 'gender' => 'M', 'enroll_year' => '2018', 'current_academic_year' => '2020/2021', 'current_semester' => 6],
        ];


        foreach ($students as $student) {
            Student::updateOrCreate(['user_id' => $student['user_id']], $student);
        }
    }
}
