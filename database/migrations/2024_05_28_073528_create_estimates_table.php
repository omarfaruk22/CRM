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
        Schema::create('estimates', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('sent')->default(0);
            $table->datetime('datesend')->nullable();
            $table->integer('clientid');
            $table->string('deleted_customer_name')->nullable();

            $table->integer('project_id')->nullable()->default(0);
            $table->integer('number');
            $table->string('prefix')->nullable();
            $table->integer('number_format')->default(0);
            $table->string('hash');
            $table->datetime('datecreated');
            $table->date('date');
            $table->date('expirydate')->nullable();
            $table->integer('currency');
            $table->decimal('subtotal', 15, 2);
            $table->decimal('total_tax', 15, 2)->default(0.00);
            $table->decimal('total', 15, 2);
            $table->decimal('adjustment', 15, 2)->nullable();

            $table->integer('status')->nullable()->default(1);
            $table->text('clientnote')->nullable();
            $table->text('adminnote')->nullable();

            $table->decimal('discount_percent', 15, 2)->nullable()->default(0.00);
            $table->decimal('discount_total', 15, 2)->nullable()->default(0.00);
            $table->string('discount_type')->nullable();

            $table->integer('invoiceid')->nullable();
            $table->datetime('invoiced_date')->nullable();
            $table->text('terms')->nullable();
            $table->string('reference_no')->nullable();
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
            $table->tinyInteger('show_shipping_on_estimate')->default(1);
            $table->integer('show_quantity_as')->default(1);
            $table->integer('pipeline_order')->nullable()->default(1);
            $table->integer('is_expiry_notified')->nullable()->default(0);
            $table->string('acceptance_firstname')->nullable();
            $table->string('acceptance_lastname')->nullable();
            $table->string('acceptance_email')->nullable();
            $table->datetime('acceptance_date')->nullable();
            $table->string('acceptance_ip')->nullable();
            $table->string('signature')->nullable();
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
        Schema::dropIfExists('estimates');
    }
};
