<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FieldtypenameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $typename = [
            ['field_type_name' => 'Input'],
            ['field_type_name' => 'Number'],
            ['field_type_name' => 'Textarea'],
            ['field_type_name' => 'Select'],
            ['field_type_name' => 'Multi Select'],
            ['field_type_name' => 'Chackbox'],
            ['field_type_name' => 'Date Picker'],
            ['field_type_name' => 'Datetime Picker'],
            ['field_type_name' => 'Color Picker'],
            ['field_type_name' => 'Hyperlink '],

        ];
        DB::table('customfield_types')->insert($typename);
    }
}
