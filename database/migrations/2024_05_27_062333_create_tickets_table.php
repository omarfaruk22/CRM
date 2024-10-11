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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->integer('adminreplying')->nullable();
            $table->unsignedBigInteger('userid')->nullable();
            $table->unsignedBigInteger('contactid')->nullable();
            $table->integer('merged_ticket_id')->nullable();
            $table->string('email')->nullable();
            $table->string('name')->nullable();
            $table->unsignedBigInteger('departmentid')->nullable();
            $table->unsignedBigInteger('priorityId')->nullable();
            $table->unsignedBigInteger('statusId')->nullable();
            $table->unsignedBigInteger('serviceId')->nullable();
            $table->string('ticketkey')->nullable();
            $table->string('subject')->nullable();
            $table->text('message')->nullable();
            $table->unsignedBigInteger('adminId')->nullable();
            $table->timestamp('date')->nullable();
            $table->unsignedBigInteger('projectId')->nullable();
            $table->timestamp('lastreply')->nullable();
            $table->unsignedInteger('clientread')->nullable();
            $table->unsignedInteger('adminread')->nullable();
            $table->unsignedBigInteger('assigned')->nullable();
            $table->unsignedBigInteger('staff_id_replying')->nullable();
            $table->string('cc')->nullable();
            $table->string('tags')->nullable();
            $table->string('contact')->nullable();
            $table->string('assignticket')->nullable();
            $table->string('slug')->nullable();
            $table->string('predefined')->nullable();
            $table->string('knowledge')->nullable();
            $table->text('description')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->timestamps();

            // Adding foreign key constraints
            $table->foreign('userid')->references('id')->on('staff')->onDelete('cascade');
            $table->foreign('contactid')->references('id')->on('contacts')->onDelete('cascade');
            $table->foreign('departmentid')->references('id')->on('departments')->onDelete('cascade');
            $table->foreign('priorityId')->references('id')->on('ticket_priorities')->onDelete('cascade');
            $table->foreign('statusId')->references('id')->on('ticket_statuses')->onDelete('cascade');
            $table->foreign('serviceId')->references('id')->on('services')->onDelete('cascade');
            $table->foreign('projectId')->references('id')->on('projects')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tickets', function (Blueprint $table) {
            //
        });
    }
};
