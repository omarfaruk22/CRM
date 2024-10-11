<?php

namespace Database\Seeders;

use App\Models\SaleStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SaleStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $salesstatus = [

            ['name' => 'Draft', 'isdefault' => '1', 'color' => '#ff2d42', 'statusorder' => '1'],
            ['name' => 'Sent', 'isdefault' => '1', 'color' => '#22c55e', 'statusorder' => '2'],
            ['name' => 'Open', 'isdefault' => '1', 'color' => '#2563eb', 'statusorder' => '3'],
            ['name' => 'On Hold', 'isdefault' => '1', 'color' => '#64748b', 'statusorder' => '4'],
            ['name' => 'Closed', 'isdefault' => '1', 'color' => '#03a9f4', 'statusorder' => '5'],


        ];

        DB::table('sale_statuses')->insert($salesstatus);
    }



}
