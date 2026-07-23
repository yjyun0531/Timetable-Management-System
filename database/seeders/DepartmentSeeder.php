<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            ['code' => 'D3E', 'name' => 'Department of Electrical & Electronics Engineering'],
            ['code' => 'DASD', 'name' => 'Department of Architecture & Sustainable Design'],
            ['code' => 'DCI', 'name' => 'Department of Civil Engineering'],
            ['code' => 'DCL', 'name' => 'Department of Chemical Engineering'],
            ['code' => 'DMAS', 'name' => 'Department of Mathematical & Actuarial Sciences'],
            ['code' => 'DMBE', 'name' => 'Department of Mechatronics & Biomedical Engineering'],
            ['code' => 'DMME', 'name' => 'Department of Mechanical & Materials Engineering'],
            ['code' => 'DC', 'name' => 'Department of Computing'],
        ];

        DB::table('departments')->insert($departments);
    }
}
