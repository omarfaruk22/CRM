<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProjectSettingsvisiabletab extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projectvisibletab = [
            ['name' => 'Overview', 'value' => 'project_overview'],
            ['name' => 'Tasks', 'value' => 'project_tasks'],
            ['name' => 'Timesheets', 'value' => 'project_timesheets'],
            ['name' => 'Milestones', 'value' => 'project_milestones'],
            ['name' => 'Files', 'value' => 'project_files'],
            ['name' => 'Discussions', 'value' => 'project_discussions'],
            ['name' => 'Gantt', 'value' => 'project_gantt'],
            ['name' => 'Tickets', 'value' => 'project_tickets'],
            ['name' => 'Contracts', 'value' => 'project_contracts'],
            ['name' => 'Proposals', 'value' => 'project_proposals'],
            ['name' => 'Estimates', 'value' => 'project_estimates'],
            ['name' => 'Invoices', 'value' => 'project_invoices'],
            ['name' => 'Subscriptions', 'value' => 'project_subscriptions'],
            ['name' => 'Expenses', 'value' => 'project_expenses'],
            ['name' => 'Credit Notes', 'value' => 'project_credit_notes'],
            ['name' => 'Notes', 'value' => 'project_notes'],
            ['name' => 'Activity', 'value' => 'project_activity']
        ];
        DB::table('project_settings_vissiabletabs')->insert($projectvisibletab);
    }
}
