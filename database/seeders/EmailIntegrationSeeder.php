<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmailIntegrationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $emailIntegration = array(
            'active' => 1,
            'email' => 'example@example.com',
            'imap_server' => 'imap.example.com',
            'password' => 'password',
            'check_every' => 5,
            'responsible' => 1,
            'lead_source' => 1,
            'lead_status' => 1,
            'encryption' => 'ssl',
            'folder' => 'INBOX',
            'last_run' => now(),
            'notify_lead_imported' => 1,
            'notify_lead_contact_more_times' => 1,
            'notify_type' => 'email',
            'notify_ids' => '1,2,3',
            'mark_public' => 1,
            'only_loop_on_unseen_emails' => 0,
            'delete_after_import' => 0,
            'create_task_if_customer' => 1,
            'created_by' => 'admin',
            'updated_by' => 'admin',
        );

        DB::table('leads_email_integrations')->insert($emailIntegration);
    }
}
