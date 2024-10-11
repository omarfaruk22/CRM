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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->integer('status')->default(0);
            $table->integer('customer_id')->nullable();
            $table->integer('billing_type')->nullable();
            $table->timestamp('start_date')->nullable();
            $table->timestamp('deadline')->nullable();
            $table->integer('progress')->nullable();
            $table->integer('progress_from_tasks')->default(0);
            $table->decimal('project_cost',)->nullable();
            $table->decimal('project_rate_per_hour')->nullable();
            $table->decimal('estimated_hours')->nullable();
            $table->integer('addedfrom')->nullable();
            $table->integer('contact_notification')->default(0);
            $table->text('notify_contacts')->nullable();
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
        Schema::dropIfExists('projects');
    }
};
