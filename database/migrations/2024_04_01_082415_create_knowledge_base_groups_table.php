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
        Schema::create('knowledge_base_groups', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->mediumtext('group_slug')->nullable();
            $table->longtext('description')->nullable();
            $table->tinyInteger('active');
            $table->string('color')->default('#28B8DA');
            $table->integer('group_order')->default(0);
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
        Schema::dropIfExists('knowledge_base_groups');
    }
};
