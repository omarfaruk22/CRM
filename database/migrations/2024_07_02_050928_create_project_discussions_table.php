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
        Schema::create('project_discussions', function (Blueprint $table) {
            $table->id();
            $table->integer('project_id')->nullable();
            $table->string('subject')->nullable();
            $table->mediumText('description')->nullable();
            $table->tinyInteger('show_to_customer')->nullable()->default('0');
            $table->datetime('last_activity')->nullable();
            $table->integer('contact_id')->nullable()->default(0);
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
        Schema::dropIfExists('project_discussions');
    }
};
