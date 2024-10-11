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
        Schema::create('subscription_mods', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->tinyInteger('description_in_item')->nullable();
            $table->string('clientid')->nullable();
            $table->date('date')->default(date('Y-m-d')); // formatted here
            $table->string('terms')->nullable();
            $table->string('currency')->nullable();
            $table->integer('tax_id')->default(0);
            $table->string('stripe_tax_id')->nullable();
            $table->integer('tax_id_2')->default(0);
            $table->string('stripe_tax_id_2', 50)->nullable();
            $table->text('stripe_plan_id')->nullable();
            $table->text('stripe_subscription_id')->nullable();
            $table->string('next_billing_cycle')->nullable();
            $table->string('ends_at')->nullable();
            $table->string('status')->nullable();
            $table->string('quantity')->default(1);
            $table->string('project_id')->default(0);
            $table->string('hash')->nullable();
            $table->date('created')->default(date('Y-m-d')); // formatted here
            $table->string('created_from')->nullable();
            $table->date('date_subscribed')->default(date('Y-m-d')); // formatted here
            $table->string('in_test_environment')->nullable();
            $table->date('last_sent_at')->default(date('Y-m-d')); // formatted here
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscription_mods');
    }
};
