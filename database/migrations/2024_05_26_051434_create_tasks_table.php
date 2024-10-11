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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->integer('priority')->nullable();
            $table->date('startdate')->nullable();
            $table->date('duedate')->nullable();
            $table->dateTime('datefinished')->nullable();
            $table->integer('addedfrom')->nullable();
            $table->tinyInteger('is_added_from_contact')->default(0);
            $table->integer('status')->default(0);
            $table->string('recurring_type')->nullable();
            $table->integer('repeat_every')->nullable();
            $table->integer('recurring')->default(0);
            $table->integer('is_recurring_from')->nullable();
            $table->integer('cycles')->default(0);
            $table->integer('total_cycles')->default(0);
            $table->tinyInteger('custom_recurring')->default(0);
            $table->date('last_recurring_date')->nullable();
            $table->integer('rel_id')->nullable();
            $table->string('rel_type')->nullable();
            $table->tinyInteger('is_public')->default(0);
            $table->tinyInteger('billable')->default(0);
            $table->tinyInteger('billed')->default(0);
            $table->integer('invoice_id')->default(0);
            $table->decimal('hourly_rate', 15, 2)->default(0.00);
            $table->integer('milestone')->nullable()->default(0);
            $table->integer('kanban_order')->nullable()->default(1);
            $table->integer('milestone_order')->default(0);
            $table->tinyInteger('visible_to_client')->default(0);
            $table->integer('deadline_notified')->default(0);
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
        Schema::dropIfExists('tasks');
    }
};
