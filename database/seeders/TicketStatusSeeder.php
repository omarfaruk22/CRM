<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TicketStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ticketStatuses = array(
            array('name' => 'Open', 'isdefault' => '1', 'statuscolor' => '#ff2d42', 'statusorder' => '1'),
            array('name' => 'In progress', 'isdefault' => '1', 'statuscolor' => '#22c55e', 'statusorder' => '2'),
            array('name' => 'Answered', 'isdefault' => '1', 'statuscolor' => '#2563eb', 'statusorder' => '3'),
            array('name' => 'On Hold', 'isdefault' => '1', 'statuscolor' => '#64748b', 'statusorder' => '4'),
            array('name' => 'Closed', 'isdefault' => '1', 'statuscolor' => '#03a9f4', 'statusorder' => '5'),
        );

        DB::table('ticket_statuses')->insert($ticketStatuses);
    }
}
