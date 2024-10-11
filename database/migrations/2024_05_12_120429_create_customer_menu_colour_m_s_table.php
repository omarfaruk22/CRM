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
        Schema::create('customer_menu_colour_m_s', function (Blueprint $table) {
            $table->id();
            $table->string('navigation_bg_cl')->nullable();
            $table->string('nav_link_cl')->nullable();
            $table->string('footer_bg_cl')->nullable();
            $table->string('footer_txt_cl')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_menu_colour_m_s');
    }
};
