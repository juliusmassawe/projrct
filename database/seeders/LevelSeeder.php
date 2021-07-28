<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin\Level;


class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $levels = [
            ['name' => 'Certificate', 'category' => 'Undergraduate'],
            ['name' => 'Diploma', 'category' => 'Undergraduate'],
            ['name' => 'Bachelors', 'category' => 'Undergraduate'],
            ['name' => 'Masters', 'category' => 'Post Graduate'],
            ['name' => 'Postgraduate Diploma', 'category' => 'Postgraduate'],
            ['name' => 'Doctrate', 'category' => 'Postgraduate'],
        ];

        foreach ($levels as $level){
            Level::updateOrCreate(['name' => $level['name']], $level);
        }
    }
}
