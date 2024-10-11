<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $itemsData = [
            [
                'id' => 1,
                'description' => 'Sample description ',
                'long_description' => 'This is a long description',
                'rate' => 100.50,
                'tax' => 10,
                'tax2' => 5,
                'unit' => 2,
                'group_id' => 1,
                'rate_currency_2' => 95.75,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'description' => 'Sample description 2',
                'long_description' => 'This is a long description m',
                'rate' => 400.75,
                'tax' => 15,
                'tax2' => 8,
                'unit' => 4,
                'group_id' => 2,
                'rate_currency_2' => 180.90,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('tb_items')->insert($itemsData);
    }
}
