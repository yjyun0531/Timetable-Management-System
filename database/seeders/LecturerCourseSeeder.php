<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LecturerCourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lecturerCourses = [
            ['lecturer_id' => 1, 'offering_id' => 1, 'class_group' => 'L1'],
            ['lecturer_id' => 2, 'offering_id' => 2, 'class_group' => 'L1'],
            ['lecturer_id' => 3, 'offering_id' => 3, 'class_group' => 'T1'],
            ['lecturer_id' => 4, 'offering_id' => 4, 'class_group' => 'L1'],
            ['lecturer_id' => 5, 'offering_id' => 5, 'class_group' => 'L1'],
            ['lecturer_id' => 6, 'offering_id' => 6, 'class_group' => 'L1'],
        ];

        DB::table('lecturer_courses')->insert($lecturerCourses);
    }
}
