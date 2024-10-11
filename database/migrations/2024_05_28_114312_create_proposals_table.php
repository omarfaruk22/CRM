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
        Schema::create('proposals', function (Blueprint $table) {
            $table->id();

            $table->string('subject')->nullable();
            $table->longText('content')->nullable();
            $table->decimal('total', 15, 2)->nullable();
            $table->decimal('subtotal', 15, 2)->nullable();
            $table->decimal('total_tax', 15, 2)->nullable()->default(0.00);
            $table->decimal('adjustment', 15, 2)->nullable();
            $table->decimal('discount_percent', 15, 2)->nullable();
            $table->decimal('discount_total', 15, 2)->nullable();
            $table->string('discount_type')->nullable();
            $table->integer('show_quantity_as')->nullable()->default(1);
            $table->integer('currency')->nullable();
            $table->date('open_till')->nullable();
            $table->date('date')->nullable();
            $table->integer('rel_id')->nullable();
            $table->string('rel_type')->nullable();
            $table->integer('assigned')->nullable();
            $table->string('hash')->nullable();
            $table->string('proposal_to')->nullable();
            $table->integer('project_id')->nullable();
            $table->integer('country')->nullable()->default(0);
            $table->string('zip')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->tinyInteger('allow_comments')->nullable()->default(1);
            $table->integer('status')->nullable();
            $table->integer('estimate_id')->nullable();
            $table->integer('invoice_id')->nullable();
            $table->datetime('date_converted')->nullable();
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
        Schema::dropIfExists('proposals');
    }
};
