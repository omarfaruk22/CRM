<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsFormatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings_documentformats = [
            ['name' => 'A4 Portrait', 'value' => 'A4_PORTRAIT'],
            ['name' => 'A4 Landscape', 'value' => 'A4_LANDSCAPE'],
            ['name' => 'Letter Portrait', 'value' => 'LETTER_PORTRAIT'],
            ['name' => 'Letter Landscape', 'value' => 'LETTER_LANDSCAPE']


        ];

        DB::table('settings_documentformats')->insert($settings_documentformats);
    }
}
