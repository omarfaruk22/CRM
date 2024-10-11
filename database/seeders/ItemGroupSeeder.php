<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define the dummy data
        $itemGroups = [
            ['name' => 'Group A'],
            ['name' => 'Group B'],
        ];

        // Insert the data into the database
        DB::table('item_groups')->insert($itemGroups);
    }
}
