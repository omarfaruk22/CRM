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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('sent')->default(0);
            $table->datetime('datesend')->nullable();
            $table->integer('clientid');
            $table->string('deleted_customer_name')->nullable();
            $table->integer('number');
            $table->string('prefix')->nullable();
            $table->integer('number_format')->default(0);
            $table->datetime('datecreated');
            $table->date('date');
            $table->date('duedate');
            $table->integer('currency');
            $table->decimal('subtotal', 15, 2);
            $table->decimal('total_tax', 15, 2)->default(0.00);
            $table->decimal('total', 15, 2);
            $table->decimal('adjustment', 15, 2)->nullable();
            $table->string('hash');
            $table->integer('status')->nullable()->default(1);
            $table->text('clientnote')->nullable();
            $table->text('adminnote')->nullable();
            $table->date('last_overdue_reminder')->nullable();
            $table->date('last_due_reminder')->nullable();
            $table->integer('cancel_overdue_reminders')->default(0);
            $table->longText('allowed_payment_modes')->nullable();
            $table->longText('token')->nullable();
            $table->decimal('discount_percent', 15, 2)->nullable()->default(0.00);
            $table->decimal('discount_total', 15, 2)->nullable()->default(0.00);


            $table->string('discount_type');
            $table->integer('recurring')->default(0);
            $table->string('recurring_type')->nullable();
            $table->tinyInteger('custom_recurring')->default(0);
            $table->integer('cycles')->default(0);
            $table->integer('total_cycles')->default(0);
            $table->integer('is_recurring_from')->nullable();
            $table->date('last_recurring_date')->nullable();
            $table->text('terms')->nullable();
            $table->integer('sale_agent')->default(0);
            $table->string('billing_street')->nullable();
            $table->string('billing_city')->nullable();
            $table->string('billing_state')->nullable();
            $table->string('billing_zip')->nullable();
            $table->integer('billing_country')->nullable();
            $table->string('shipping_street')->nullable();
            $table->string('shipping_city')->nullable();
            $table->string('shipping_state')->nullable();
            $table->string('shipping_zip')->nullable();
            $table->integer('shipping_country')->nullable();
            $table->tinyInteger('include_shipping');
            $table->tinyInteger('show_shipping_on_invoice')->default(1);
            $table->integer('show_quantity_as')->default(1);
            $table->integer('project_id')->nullable()->default(0);
            $table->integer('subscription_id')->default(0);
            $table->string('short_link')->nullable();
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
        Schema::dropIfExists('invoices');
    }
};
