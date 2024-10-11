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
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->integer('rel_id')->nullable();
            $table->string('rel_type')->nullable();
            $table->string('file_name')->nullable();
            $table->string('filetype')->nullable();
            $table->integer('visible_to_customer')->nullable()->default(0);
            $table->string('attachment_key')->nullable();
            $table->string('external')->nullable();
            $table->text('external_link')->nullable();
            $table->text('thumbnail_link')->nullable()->comment('for external uses');
            $table->integer('staffid')->nullable();
            $table->integer('contact_id')->nullable()->default(0);
            $table->integer('comment_id')->nullable()->default(0);
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
        Schema::dropIfExists('files');
    }
};
