<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('leads_email_integrations', function (Blueprint $table) {
            $table->id();
            $table->integer('active')->nullable();
            $table->string('email')->nullable();
            $table->string('imap_server')->nullable();
            $table->longtext('password')->nullable();
            $table->integer('check_every')->nullable();
            $table->integer('responsible')->nullable();
            $table->integer('lead_source')->nullable();
            $table->integer('lead_status')->nullable();
            $table->string('encryption')->nullable();
            $table->string('folder')->nullable();
            $table->string('last_run')->nullable();
            $table->tinyInteger('notify_lead_imported')->nullable();
            $table->tinyInteger('notify_lead_contact_more_times')->nullable();
            $table->string('notify_type')->nullable();
            $table->longtext('notify_ids')->nullable();
            $table->integer('mark_public')->nullable();
            $table->tinyInteger('only_loop_on_unseen_emails')->nullable();
            $table->integer('delete_after_import')->nullable();
            $table->integer('create_task_if_customer')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leads_email_integrations');
    }
};
