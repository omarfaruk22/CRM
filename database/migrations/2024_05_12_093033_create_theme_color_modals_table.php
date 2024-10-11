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
        Schema::create('theme_color_modals', function (Blueprint $table) {
            $table->id();
            $table->string('sidebar_color')->nullable();
            $table->string('sidebar_link_color')->nullable();
            $table->string('sidebar_active_item_background_color')->nullable();
            $table->string('sidebar_active_item_color')->nullable();
            $table->string('top_header_background_color')->nullable();
            $table->string('header_link_color')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('theme_color_modals');
    }
};
