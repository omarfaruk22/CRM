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
        Schema::create('task_assignes', function (Blueprint $table) {
            $table->id();
            $table->string('staffid')->nullable();
            $table->integer('taskid')->nullable();
            $table->integer('assigned_from')->nullable()->default(0);
            $table->tinyInteger('is_assigned_from_contact')->nullable()->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('task_assignes');
    }
};
