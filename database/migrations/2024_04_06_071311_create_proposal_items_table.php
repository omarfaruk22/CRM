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
        Schema::create('proposal_items', function (Blueprint $table) {
            $table->id();
            $table->longText("description");
            $table->mediumText("long_description")->nullable();
            $table->decimal("rate");
            $table->integer("tax")->nullable();
            $table->integer("tax2")->nullable();
            $table->string("unit")->nullable();
            $table->integer("group_id")->nullable();
            $table->decimal("rate_currency_2")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proposal_items');
    }
};
