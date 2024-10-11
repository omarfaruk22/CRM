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
        Schema::create('consents', function (Blueprint $table) {
            $table->id();
            $table->string('action');
            $table->dateTime('date');
            $table->string('ip');
            $table->integer('contact_id')->default(0);
            $table->integer('lead_id')->default(0);
            $table->text('description')->nullable();
            $table->text('opt_in_purpose_description')->nullable();
            $table->integer('purpose_id');
            $table->string('staff_name')->nullable();
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
        Schema::dropIfExists('consents');
    }
};
