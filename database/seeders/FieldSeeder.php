<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fieldName = [
            ['name' => 'Name'],
            ['name' => 'Position'],
            ['name' => 'Email Address'],
            ['name' => 'Phone'],
            ['name' => 'Lead Value'],
            ['name' => 'Company'],
            ['name' => 'Address'],
            ['name' => 'City'],
            ['name' => 'State'],
            ['name' => 'Country'],
            ['name' => 'Zip Code'],
            ['name' => 'Description'],
            ['name' => 'Website'],
        ];
        DB::table('fields')->insert($fieldName);
    }
}
