<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RelationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $relation = [
            ['name' => 'Lead', 'isdefault' => '1', 'color' => '#ff2d42', 'statusorder' => '1'],
            ['name' => 'Customer', 'isdefault' => '1', 'color' => '#22c55e', 'statusorder' => '2'],
            ['name' => 'Contact', 'isdefault' => '1', 'color' => '#2563eb', 'statusorder' => '3'],
        ];

        DB::table('relations')->insert($relation);
    }
}
