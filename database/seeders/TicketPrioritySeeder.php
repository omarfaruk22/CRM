<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TicketPrioritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ticketPriority = [
            ['name' => 'Low'],
            ['name' => 'Medium'],
            ['name' => 'High'],

        ];

        DB::table('ticket_priorities')->insert($ticketPriority);
    }
}
