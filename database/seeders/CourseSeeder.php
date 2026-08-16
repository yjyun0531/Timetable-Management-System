<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = [
            [
                'department_id' => 8,
                'course_code' => 'UECS2033',
                'course_name' => 'SOFTWARE PROJECT MANAGEMENT',
                'description' => 'Core subject, 3.0 credit hours.',
                'lecture_hours' => 2,
                'tutorial_hours' => 1,
                'practical_hours' => 0,
                'is_elective' => false,
                'required_choices' => null,
                'elective_pool_size' => null,
                'course_category' => 'normal',
                'is_active' => true,
            ],
            [
                'department_id' => 8,
                'course_code' => 'UECS2194',
                'course_name' => 'WEB APPLICATION DEVELOPMENT',
                'description' => 'Core subject, 4.0 credit hours.',
                'lecture_hours' => 2,
                'tutorial_hours' => 0,
                'practical_hours' => 2,
                'is_elective' => false,
                'required_choices' => null,
                'elective_pool_size' => null,
                'course_category' => 'normal',
                'is_active' => true,
            ],
            [
                'department_id' => 8,
                'course_code' => 'UECS2344',
                'course_name' => 'SOFTWARE DESIGN',
                'description' => 'Core subject, 4.0 credit hours.',
                'lecture_hours' => 2,
                'tutorial_hours' => 0,
                'practical_hours' => 2,
                'is_elective' => false,
                'required_choices' => null,
                'elective_pool_size' => null,
                'course_category' => 'normal',
                'is_active' => true,
            ],
            [
                'department_id' => 8,
                'course_code' => 'UECS2354',
                'course_name' => 'SOFTWARE TESTING',
                'description' => 'Core subject, 4.0 credit hours.',
                'lecture_hours' => 2,
                'tutorial_hours' => 0,
                'practical_hours' => 2,
                'is_elective' => false,
                'required_choices' => null,
                'elective_pool_size' => null,
                'course_category' => 'normal',
                'is_active' => true,
            ],
            [
                'department_id' => 8,
                'course_code' => 'UECS2403',
                'course_name' => 'OPERATING SYSTEMS',
                'description' => 'Core subject, 3.0 credit hours.',
                'lecture_hours' => 2,
                'tutorial_hours' => 1,
                'practical_hours' => 0,
                'is_elective' => false,
                'required_choices' => null,
                'elective_pool_size' => null,
                'course_category' => 'normal',
                'is_active' => true,
            ],
            [
                'department_id' => 8,
                'course_code' => 'MPU3152',
                'course_name' => 'PENGHAYATAN ETIKA DAN PERADABAN (FOR LOCAL STUDENTS)',
                'description' => 'MPU compulsory course, 2.0 credit hours.',
                'lecture_hours' => 2,
                'tutorial_hours' => 0,
                'practical_hours' => 0,
                'is_elective' => false,
                'required_choices' => null,
                'elective_pool_size' => null,
                'course_category' => 'MPU',
                'is_active' => true,
            ],

        ];

        DB::table('courses')->insert($courses);
    }
}
