<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LeadSourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $leadsource = [
            ['name' => 'Facebook'],
            ['name' => 'Google'],
            ['name' => 'Youtube'],

        ];

        DB::table('leads_sources')->insert($leadsource);
    }
}
