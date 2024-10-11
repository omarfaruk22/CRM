<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CalenderFirstday extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $calender_firstdays = [
            ['name' => 'Monday', 'value' => '1'],
            ['name' => 'Tuesday', 'value' => '2'],
            ['name' => 'Wednesday', 'value' => '3'],
            ['name' => 'Thursday', 'value' => '4'],
            ['name' => 'Friday', 'value' => '5'],
            ['name' => 'Saturday', 'value' => '6'],
            ['name' => 'Sunday', 'value' => '7']

        ];
        DB::table('calender_firstdays')->insert($calender_firstdays);
    }
}
