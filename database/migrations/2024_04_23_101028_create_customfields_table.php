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
        Schema::create('customfields', function (Blueprint $table) {
            $table->id();
            $table->string('fieldto')->nullable();
            $table->string('name');
            $table->string('slug');
            $table->tinyInteger('required')->default(0);
            $table->string('type');
            $table->text('options')->nullable();
            $table->tinyInteger('display_inline')->default(0);
            $table->integer('field_order')->default(0);
            $table->integer('active')->default(1);
            $table->integer('show_on_pdf')->default(0);
            $table->tinyInteger('show_on_ticket_form')->default(0);
            $table->tinyInteger('only_admin')->default(0);
            $table->tinyInteger('show_on_table')->default(0);
            $table->integer('show_on_client_portal')->default(0);
            $table->integer('disalow_client_to_edit')->default(0);
            $table->integer('bs_column')->default(12);
            $table->string('default_value')->nullable();
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
        Schema::dropIfExists('customfields');
    }
};
