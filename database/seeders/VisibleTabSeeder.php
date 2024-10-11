<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VisibleTabSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $visibletab = [
            ['name' => 'Notes', 'value' => 'notes'],
            ['name' => 'Statement', 'value' => 'statement'],
            ['name' => 'Invoices', 'value' => 'invoices'],
            ['name' => 'Payments', 'value' => 'payments'],
            ['name' => 'Proposals', 'value' => 'proposals'],
            ['name' => 'Credit Notes', 'value' => 'credit_notes'],
            ['name' => 'Estimates', 'value' => 'estimates'],
            ['name' => 'Subscriptions', 'value' => 'subscriptions'],
            ['name' => 'Expenses', 'value' => 'expenses'],
            ['name' => 'Contracts', 'value' => 'contracts'],
            ['name' => 'Projects', 'value' => 'projects'],
            ['name' => 'Tasks', 'value' => 'tasks'],
            ['name' => 'Tickets', 'value' => 'tickets'],
            ['name' => 'Files', 'value' => 'attachments'],
            ['name' => 'Vault', 'value' => 'vault'],
            ['name' => 'Reminders', 'value' => 'reminders'],
            ['name' => 'Map', 'value' => 'map']
        ];
        DB::table('setting_visible_tabs')->insert($visibletab);
    }
}
