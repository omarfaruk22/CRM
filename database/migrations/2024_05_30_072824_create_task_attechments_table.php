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
        Schema::create('task_attechments', function (Blueprint $table) {
            $table->id();
            $table->integer('task_id')->nullable();
            $table->integer('reply_id')->nullable();
            $table->string('file_name')->nullable();
            $table->string('filetype')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('task_attechments');
    }
};
