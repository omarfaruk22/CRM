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
        Schema::create('task_checklist_items', function (Blueprint $table) {
            $table->id();
            $table->integer('taskid')->nullable();
            $table->text('description')->nullable();
            $table->integer('finished')->nullable();
            $table->integer('addedfrom')->nullable();
            $table->integer('finished_from')->nullable()->default(0);
            $table->integer('list_order')->nullable()->default(0);
            $table->integer('assigned')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('task_checklist_items');
    }
};
