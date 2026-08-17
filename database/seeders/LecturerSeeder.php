<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            ['name' => 'Dr. Faranak Nejati', 'department_id' => 8],
            ['name' => 'Dr. Noor Azeera binti Abdul Aziz', 'department_id' => 8],
            ['name' => 'Dr. Gunavathi a/p Duraisamy', 'department_id' => 8],
            ['name' => 'Dr. Kelwin Tan Seen Tiong', 'department_id' => 8],
            ['name' => 'Dr. Norazah binti Yusof', 'department_id' => 8],
            ['name' => 'Dr. Nor Azlili binti Hassan', 'department_id' => 8],
        ];

        DB::table('lecturers')->insert($lecturers);
    }
}
