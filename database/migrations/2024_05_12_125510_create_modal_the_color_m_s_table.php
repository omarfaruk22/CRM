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
        Schema::create('modal_the_color_m_s', function (Blueprint $table) {
            $table->id();
            $table->string('head_bg')->nullable();
            $table->string('head_clr')->nullable();
            $table->string('close_btn_clr')->nullable();
            $table->string('head_txt_clr')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modal_the_color_m_s');
    }
};
