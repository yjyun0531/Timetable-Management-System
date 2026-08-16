<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseOfferingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courseOfferings = [
            ['course_id' => 1, 'batch_code' => 'SEY3Y3', 'trimester' => 'Y2026T1', 'num_students' => 105, 'is_shared_programme' => false],
            ['course_id' => 2, 'batch_code' => 'SEY3T2', 'trimester' => 'Y2026T1', 'num_students' => 30,  'is_shared_programme' => false],
            ['course_id' => 3, 'batch_code' => 'SEY3T1', 'trimester' => 'Y2026T1', 'num_students' => 75,  'is_shared_programme' => false],
            ['course_id' => 4, 'batch_code' => 'SEY3Y3', 'trimester' => 'Y2026T1', 'num_students' => 40,  'is_shared_programme' => false],
            ['course_id' => 5, 'batch_code' => 'SEY1Y1', 'trimester' => 'Y2026T1', 'num_students' => 120, 'is_shared_programme' => false],
            ['course_id' => 6, 'batch_code' => 'SEY1Y1', 'trimester' => 'Y2026T1', 'num_students' => 120, 'is_shared_programme' => true],
        ];

        DB::table('course_offerings')->insert($courseOfferings);
    }
}