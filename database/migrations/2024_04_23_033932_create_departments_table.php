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
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('imap_username')->nullable();
            $table->string('email')->nullable();
            $table->tinyInteger('email_from_header')->default(0);
            $table->string('host')->nullable();
            $table->longText('password')->nullable();
            $table->string('encryption')->nullable();
            // $table->string('folder')->default('INBOX');
            // $table->integer('delete_after_import')->default(0);
            $table->longtext('calendar_id')->nullable();
            $table->tinyInteger('hidefromclient')->default(0);
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
        Schema::dropIfExists('departments');
    }
};
