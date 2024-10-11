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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->integer('is_primary')->nullable()->default(1);
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email');
            $table->string('phonenumber');
            $table->string('title')->nullable();
            $table->string('password')->nullable();
            $table->string('new_pass_key')->nullable();
            $table->datetime('new_pass_key_requested')->nullable();
            $table->datetime('email_verified_at')->nullable();
            $table->string('email_verification_key')->nullable();
            $table->datetime('email_verification_sent_at')->nullable();
            $table->string('last_ip')->nullable();
            $table->datetime('last_login')->nullable();
            $table->datetime('last_password_change')->nullable();
            $table->tinyInteger('active')->default(1);
            $table->string('profile_image')->nullable();
            $table->string('direction')->nullable();
            $table->tinyInteger('invoice_emails')->nullable()->default(1);
            $table->tinyInteger('estimate_emails')->nullable()->default(1);
            $table->tinyInteger('credit_note_emails')->nullable()->default(1);
            $table->tinyInteger('contract_emails')->nullable()->default(1);
            $table->tinyInteger('task_emails')->nullable()->default(1);
            $table->tinyInteger('project_emails')->nullable()->default(1);
            $table->tinyInteger('ticket_emails')->nullable()->default(1);
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->timestamps();

            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
