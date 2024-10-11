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
        Schema::create('tagtables', function (Blueprint $table) {
            $table->id();
            $table->string('rel_id')->nullable();
            $table->string('rel_type')->nullable();
            $table->string('tag_id')->nullable();
            $table->integer('tag_order')->default(0);
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
        Schema::dropIfExists('tagtables');
    }
};
