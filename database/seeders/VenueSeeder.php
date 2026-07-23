<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VenueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $venues = [
            ['name' => 'KB321', 'capacity' => '40', 'type' => 'T'],
            ['name' => 'KB325', 'capacity' => '40', 'type' => 'B'],
            ['name' => 'KB326', 'capacity' => '40', 'type' => 'B'],
            ['name' => 'KB516', 'capacity' => '40', 'type' => 'T'],
            ['name' => 'KB517', 'capacity' => '40', 'type' => 'T'],
            ['name' => 'KB518', 'capacity' => '40', 'type' => 'T'],
            ['name' => 'KB519', 'capacity' => '40', 'type' => 'T'],
            ['name' => 'KB523', 'capacity' => '40', 'type' => 'T'],
            ['name' => 'KB524', 'capacity' => '40', 'type' => 'T'],
            ['name' => 'KB522', 'capacity' => '90', 'type' => 'B'],
            ['name' => 'KB300', 'capacity' => '90', 'type' => 'B'],
            ['name' => 'KB324', 'capacity' => '90', 'type' => 'B'],
            ['name' => 'KB301', 'capacity' => '110', 'type' => 'L'],
            ['name' => 'KB315', 'capacity' => '110', 'type' => 'L'],
            ['name' => 'KB316', 'capacity' => '110', 'type' => 'L'],
            ['name' => 'KB323', 'capacity' => '110', 'type' => 'L'],
            ['name' => 'KB521', 'capacity' => '110', 'type' => 'L'],
            ['name' => 'KB204', 'capacity' => '120', 'type' => 'L'],
            ['name' => 'KB205', 'capacity' => '120', 'type' => 'L'],
            ['name' => 'KB206', 'capacity' => '120', 'type' => 'L'],
            ['name' => 'KB207', 'capacity' => '200', 'type' => 'L'],
            ['name' => 'KB208', 'capacity' => '200', 'type' => 'L'],
            ['name' => 'KB209', 'capacity' => '200', 'type' => 'L'],
            ['name' => 'KB213', 'capacity' => '200', 'type' => 'L'],
        ];

        DB::table('venues')->insert($venues);
    }
}