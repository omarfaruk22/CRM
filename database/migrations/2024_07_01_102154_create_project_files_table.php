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
        Schema::create('project_files', function (Blueprint $table) {
            $table->id();
            $table->string('file_name')->nullable();
            $table->longText('original_file_name')->nullable();
            $table->string('subject')->nullable();
            $table->mediumText('description')->nullable();
            $table->string('filetype')->nullable();
            $table->datetime('last_activity')->nullable();
            $table->integer('project_id')->nullable();
            $table->tinyInteger('visible_to_customer')->nullable()->default(0);
            $table->integer('staffid')->nullable();
            $table->integer('contact_id')->nullable()->default(0);
            $table->string('external')->nullable();
            $table->mediumText('external_link')->nullable();
            $table->mediumText('thumbnail_link')->nullable();
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
        Schema::dropIfExists('project_files');
    }
};
