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
        Schema::create('main_leads', function (Blueprint $table) {
            $table->id();
            $table->string('hash', 65)->nullable();
            $table->string('name')->nullable();
            $table->string('title', 100)->nullable();
            $table->string('company', 191)->nullable();
            $table->mediumText('description')->nullable();
            $table->string('country')->default(0);
            $table->string('zip')->nullable();
            $table->string('city')->nullable();
            $table->string('language')->nullable();
            $table->string('state', 50)->nullable();
            $table->string('address', 100)->nullable();
            $table->integer('assigned')->default(0);
            $table->timestamp('dateadded')->nullable();
            $table->integer('from_form_id')->default(0);
            $table->string('status')->default(0);
            $table->integer('source')->nullable();
            $table->string('lastcontact')->nullable();
            $table->timestamp('dateassigned')->nullable();
            $table->timestamp('last_status_change')->nullable();
            $table->integer('addedfrom')->default(0);
            $table->string('email', 100)->nullable();
            $table->string('website', 150)->nullable();
            $table->integer('leadorder')->default(1);
            $table->string('phonenumber', 50)->nullable();
            $table->timestamp('date_converted')->nullable();
            $table->tinyInteger('lost')->default(0);
            $table->integer('junk')->default(0);
            $table->integer('last_lead_status')->default(0);
            $table->tinyInteger('is_imported_from_email_integration')->default(0);
            $table->string('email_integration_uid', 30)->nullable();
            $table->tinyInteger('is_public')->default(0);
            $table->string('default_language', 40)->nullable();
            $table->integer('client_id')->default(0);
            $table->integer('lead_value')->nullable();
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
        Schema::dropIfExists('main_leads');
    }
};
