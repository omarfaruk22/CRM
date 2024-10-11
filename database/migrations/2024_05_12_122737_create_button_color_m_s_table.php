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
        Schema::create('button_color_m_s', function (Blueprint $table) {
            $table->id();
            $table->string('btn_default')->nullable();
            $table->string('btn_primary')->nullable();
            $table->string('btn_info')->nullable();
            $table->string('btn_success')->nullable();
            $table->string('btn_danger')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('button_color_m_s');
    }
};
