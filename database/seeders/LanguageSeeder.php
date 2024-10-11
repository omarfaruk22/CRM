<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $language = [
            ['name' => 'English'],
            ['name' => 'Spanish'],
            ['name' => 'French'],
            ['name' => 'German'],
            ['name' => 'Chinese'],
            ['name' => 'Arabic'],
            ['name' => 'Russian'],
            ['name' => 'Portuguese'],
            ['name' => 'Hindi'],
            ['name' => 'Bengali'],
            ['name' => 'Japanese'],
            ['name' => 'Urdu'],
            ['name' => 'Punjabi'],
            ['name' => 'Korean'],
            ['name' => 'Italian'],
            ['name' => 'Turkish'],
            ['name' => 'Dutch'],
            ['name' => 'Greek'],
            ['name' => 'Swedish'],
            ['name' => 'Polish'],
        ];

        DB::table('languages')->insert($language);
    }
}
