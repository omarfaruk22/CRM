<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CalenderDefaultView extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $calender_views = [
            ['name' => 'Month', 'value' => 'dayGridMonth'],
            ['name' => 'Week', 'value' => 'dayGridWeek'],
            ['name' => 'Day', 'value' => 'dayGridDay'],
            ['name' => 'Agenda Week', 'value' => 'timeGridWeek'],
            ['name' => 'Agenda Day', 'value' => 'timeGridDay']

        ];
        DB::table('calender_views')->insert($calender_views);
    }
}
