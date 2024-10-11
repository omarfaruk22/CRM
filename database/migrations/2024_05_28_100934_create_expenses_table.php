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
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->integer('category')->nullable();
            $table->integer('currency')->nullable();
            $table->decimal('amount', 15, 2)->nullable();
            $table->integer('tax')->nullable();
            $table->integer('tax2')->nullable()->default(0);
            $table->string('reference_no')->nullable();
            $table->text('note')->nullable();
            $table->string('expense_name')->nullable();
            $table->integer('clientid')->nullable();
            $table->integer('project_id')->nullable()->default(0);
            $table->integer('billable')->nullable()->default(0);
            $table->integer('invoiceid')->nullable();
            $table->string('paymentmode')->nullable();
            $table->date('date')->nullable();
            $table->string('recurring_type')->nullable();
            $table->integer('repeat_every')->nullable();
            $table->integer('recurring')->nullable()->default(0);
            $table->integer('cycles')->nullable()->default(0);
            $table->integer('total_cycles')->nullable()->default(0);
            $table->integer('custom_recurring')->nullable()->default(0);
            $table->date('last_recurring_date')->nullable();
            $table->tinyInteger('create_invoice_billable')->nullable();
            $table->tinyInteger('send_invoice_to_customer')->nullable();
            $table->integer('recurring_from')->nullable();

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
        Schema::dropIfExists('expenses');
    }
};
