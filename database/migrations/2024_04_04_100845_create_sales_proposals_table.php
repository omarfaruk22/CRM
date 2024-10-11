<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Ramsey\Uuid\Type\Integer;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sales_proposals', function (Blueprint $table) {
            $table->id();
            $table->string('subject')->nullable();
            $table->string('releted');
            $table->string('subreleted');
            $table->string('status');
            $table->string('assigned')->nullable();
            $table->string('to')->nullable();
            $table->longText('address')->nullable();
            $table->timestamp('estimateDate');
            $table->timestamp('opentill')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->integer('itemid');
            $table->decimal('total');
            $table->integer('default_currency')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales_proposals');
    }
};
