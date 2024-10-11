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
        Schema::create('tab_color_models', function (Blueprint $table) {
            $table->id();
            $table->string('tab_bg')->nullable();
            $table->string('tab_link_bg')->nullable();
            $table->string('tab_link_hov')->nullable();
            $table->string('tab_act_bdr')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tab_color_models');
    }
};
