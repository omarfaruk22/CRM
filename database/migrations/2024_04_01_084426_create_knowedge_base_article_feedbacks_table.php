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
        Schema::create('knowedge_base_article_feedbacks', function (Blueprint $table) {
            $table->id();
            $table->integer('articleanswerid');
            $table->integer('articleid');
            $table->integer('answer');
            $table->string('ip');
            $table->datetime('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('knowedge_base_article_feedbacks');
    }
};
