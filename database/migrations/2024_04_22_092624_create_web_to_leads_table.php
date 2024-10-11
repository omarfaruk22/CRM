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
        Schema::create('web_to_leads', function (Blueprint $table) {
            $table->id();
            $table->string('form_key')->nullable();
            $table->integer('lead_source')->nullable();
            $table->integer('lead_status')->nullable();
            $table->integer('notify_lead_imported')->nullable();
            $table->string('notify_type')->nullable();
            $table->longtext('notify_ids')->nullable();
            $table->integer('responsible')->nullable();
            $table->string('name')->nullable();
            $table->longtext('form_data')->nullable();
            $table->integer('recaptcha')->nullable();
            $table->string('submit_btn_name')->nullable();
            $table->string('submit_btn_text_color')->nullable();
            $table->string('submit_btn_bg_color')->nullable();
            $table->string('success_submit_msg')->nullable();
            $table->integer('submit_action')->nullable();
            $table->string('lead_name_prefix')->nullable();
            $table->longtext('submit_redirect_url')->nullable();
            $table->string('language')->nullable();
            $table->integer('allow_duplicate')->nullable();
            $table->integer('mark_public')->nullable();
            $table->string('track_duplicate_field')->nullable();
            $table->string('track_duplicate_field_and')->nullable();
            $table->integer('create_task_on_duplicate')->nullable();
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
        Schema::dropIfExists('web_to_leads');
    }
};
