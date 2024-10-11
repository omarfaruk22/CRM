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
        Schema::create('estimate_request_forms', function (Blueprint $table) {
            $table->id();
            $table->string('type')->nullable();
            $table->string('name')->nullable();
            $table->longText('form_data')->nullable();
            $table->integer('recaptcha')->nullable();
            $table->integer('status')->nullable();
            $table->string('submit_btn_name')->nullable();
            $table->string('submit_btn_bg_color')->nullable();
            $table->string('submit_btn_text_color')->nullable();
            $table->string('success_submit_msg')->nullable();
            $table->integer('submit_action')->nullable();
            $table->string('submit_redirect_url')->nullable();
            $table->integer('language')->nullable();
            $table->string('notify_type')->nullable();
            $table->string('notify_ids')->nullable();
            $table->integer('responsible')->default(0)->nullable();
            $table->integer('notify_request_submitted')->default(0)->nullable();
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
        Schema::dropIfExists('estimate_request_forms');
    }
};
