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
        Schema::create('tb_items', function (Blueprint $table) {
            $table->id();
            $table->longText('description');
            $table->mediumText('long_description')->nullable();
            $table->decimal('rate');
            $table->integer('tax')->nullable();
            $table->integer('tax2')->nullable();
            $table->string('unit', 40)->nullable();
            $table->integer('group_id')->default(0);
            $table->string('rate_currency_2')->nullable();
            $table->string('currency')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_items');
    }
};
