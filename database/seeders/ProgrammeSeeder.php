<?php

namespace Database\Seeders;

use App\Models\Programme;
use Illuminate\Database\Seeder;

class ProgrammeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $programmes = [
            ['name' => 'Certificate In Information Technology', 'abbreviation' => 'CIT', 'department_id' => 1, 'level_id' => 1, 'no_of_semesters' => 2],
            ['name' => 'Diploma In Business Information and Communication Technology', 'abbreviation' => 'DBICT', 'department_id' => 1, 'level_id' => 2, 'no_of_semesters' => 4],
            ['name' => 'Bachelors of Science In Information and Communication Technology', 'abbreviation' => 'BscBICT', 'department_id' => 1, 'level_id' => 3, 'no_of_semesters' => 6],
            ['name' => 'Bachelors of Arts In Accounting and Finance', 'abbreviation' => 'BA-AF', 'department_id' => 5, 'level_id' => 3, 'no_of_semesters' => 6],
        ];

        foreach ($programmes as $programme) {
            Programme::updateorCreate(['abbreviation' => $programme['abbreviation']], $programme);
        }
    }
}
