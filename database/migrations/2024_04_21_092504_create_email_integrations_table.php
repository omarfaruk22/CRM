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
        Schema::create('email_integrations', function (Blueprint $table) {
            $table->id();
            $table->boolean('active')->default(0);
            $table->string('email');
            $table->string('imap_server');
            $table->longText('password');
            $table->foreignId('status_id')->constrained('leads_statuses')->onDelete('cascade');
            $table->foreignId('source_id')->constrained('leads_sources')->onDelete('cascade');
            $table->foreignId('responsible_id')->constrained('staff')->onDelete('cascade');
            $table->string('encryption')->nullable();
            $table->string('folder');
            $table->integer('check_every')->default(5);
            $table->boolean('only_check')->default(0);
            $table->boolean('create_task')->default(0);
            $table->boolean('delete_mail')->default(0);
            $table->boolean('auto_mark')->default(0);
            $table->boolean('notify_lead')->default(0);
            $table->boolean('notify_mail')->default(0);
            $table->string('notify_type')->nullable();
            $table->string('notify_ids')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('email_integrations');
    }
};
