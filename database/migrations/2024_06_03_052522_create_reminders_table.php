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
        Schema::create('reminders', function (Blueprint $table) {
            $table->id();
            $table->timestamp('date')->nullable();
            $table->unsignedBigInteger('staff');
            $table->integer('isnotified')->nullable();
            $table->text('description')->nullable();
            $table->integer('notify_by_email')->default(0);
            $table->integer('rel_id')->nullable();
            $table->integer('customer_id')->nullable();
            $table->integer('lead_id')->nullable();
            $table->string('rel_type')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->timestamps();

            $table->foreign('staff')->references('id')->on('staff')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reminders');
    }
};
