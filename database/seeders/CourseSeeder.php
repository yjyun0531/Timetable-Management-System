<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
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
                'trimester_offered' => 'Year 2 Trimester 1',
                'lecture_hours' => 2,
                'tutorial_hours' => 1,
                'practical_hours' => 0,
                'num_students' => 150,
                'is_active' => true,
            ],
            [
                'department_id' => 8,
                'course_code' => 'UECS2194',
                'course_name' => 'WEB APPLICATION DEVELOPMENT',
                'description' => 'Core subject, 4.0 credit hours.',
                'trimester_offered' => 'Year 2 Trimester 1',
                'lecture_hours' => 2,
                'tutorial_hours' => 0,
                'practical_hours' => 2,
                'num_students' => 150,
                'is_active' => true,
            ],
            [
                'department_id' => 8,
                'course_code' => 'UECS2344',
                'course_name' => 'SOFTWARE DESIGN',
                'description' => 'Core subject, 4.0 credit hours.',
                'trimester_offered' => 'Year 2 Trimester 1',
                'lecture_hours' => 2,
                'tutorial_hours' => 0,
                'practical_hours' => 2,
                'num_students' => 150,
                'is_active' => true,
            ],
            [
                'department_id' => 8,
                'course_code' => 'UECS2354',
                'course_name' => 'SOFTWARE TESTING',
                'description' => 'Core subject, 4.0 credit hours.',
                'trimester_offered' => 'Year 2 Trimester 1',
                'lecture_hours' => 2,
                'tutorial_hours' => 0,
                'practical_hours' => 2,
                'num_students' => 150,
                'is_active' => true,
            ],
            [
                'department_id' => 8,
                'course_code' => 'UECS2403',
                'course_name' => 'OPERATING SYSTEMS',
                'description' => 'Core subject, 3.0 credit hours.',
                'trimester_offered' => 'Year 2 Trimester 1',
                'lecture_hours' => 2,
                'tutorial_hours' => 1,
                'practical_hours' => 0,
                'num_students' => 150,
                'is_active' => true,
            ],
        ];

        foreach ($courses as $course) {
            Course::create($course);
        }
    }
}
