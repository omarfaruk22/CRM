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
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();

            $table->longText('content')->nullable();
            $table->text('description')->nullable();
            $table->string('subject')->nullable();
            $table->integer('clientid');
            $table->date('datestart')->nullable();
            $table->date('dateend')->nullable();
            $table->integer('contract_type')->nullable();
            $table->integer('project_id')->nullable();
            $table->integer('isexpirynotified')->default(0);
            $table->decimal('contract_value', 15, 2)->default(0);
            $table->tinyInteger('trash')->nullable()->default(0);
            $table->tinyInteger('not_visible_to_client')->default(0);
            $table->string('hash')->nullable();
            $table->tinyInteger('signed')->default(0);
            $table->string('signature')->nullable();
            $table->tinyInteger('marked_as_signed')->default(0);
            $table->string('acceptance_firstname')->nullable();
            $table->string('acceptance_lastname')->nullable();
            $table->string('acceptance_email')->nullable();
            $table->datetime('acceptance_date')->nullable();
            $table->string('acceptance_ip')->nullable();
            $table->string('short_link')->nullable();
            $table->datetime('last_sent_at')->nullable();
            $table->text('contacts_sent_to')->nullable();
            $table->datetime('last_sign_reminder_at')->nullable();

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
        Schema::dropIfExists('contracts');
    }
};
