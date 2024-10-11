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
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string('hash')->nullable();
            $table->string('name');
            $table->string('title')->nullable();
            $table->string('company')->nullable();
            $table->mediumtext('description')->nullable();
            $table->integer('country')->default(0);
            $table->string('zip')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('address')->nullable();
            $table->integer('assigned')->default(0);
            $table->integer('from_form_id')->default(0);
            $table->integer('status');
            $table->integer('source');
            $table->datetime('lastcontact')->nullable();
            $table->date('dateassigned')->nullable();
            $table->datetime('last_status_change')->nullable();
            $table->integer('addedfrom');
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->integer('leadorder')->default(1);
            $table->string('phonenumber')->nullable();
            $table->datetime('date_converted')->nullable();
            $table->tinyInteger('lost')->default(0);
            $table->integer('junk')->default(0);
            $table->integer('last_lead_status')->default(0);
            $table->tinyInteger('is_imported_from_email_integration')->default(0);
            $table->string('email_integration_uid')->nullable();
            $table->tinyInteger('is_public')->default(0);
            $table->string('default_language')->nullable();
            $table->integer('client_id')->default(0);
            $table->decimal('lead_value', 10, 2)->nullable(); 
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
        Schema::dropIfExists('leads');
    }
};
