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
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('firstname');
            $table->string('lastname');
            $table->text('facebook')->nullable();
            $table->text('linkedin')->nullable();
            $table->string('phone')->nullable();
            $table->text('skype')->nullable();
            $table->string('password');
            $table->string('profile_image')->nullable();
            $table->string('last_ip')->nullable();
            $table->string('last_login')->nullable();
            $table->string('last_activity')->nullable();
            $table->string('last_password_change')->nullable();
            $table->string('new_pass_key')->nullable();
            $table->string('new_pass_key_requested')->nullable();
            $table->integer('admin')->nullable();
            $table->string('role')->nullable();
            $table->boolean('status')->default(1);
            $table->string('default_language')->nullable();
            $table->string('direction')->nullable();
            $table->string('media_path_slug')->nullable();
            $table->string('is_not_staff')->nullable();
            $table->decimal('hourly_rate', 18, 2)->default(0.00);
            $table->boolean('two_factor_auth_enabled')->default(0);
            $table->string('two_factor_auth_code')->nullable();
            $table->string('two_factor_auth_code_requested')->nullable();
            $table->string('email_signature')->nullable();
            $table->string('google_auth_secret')->nullable();
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
        Schema::dropIfExists('staff');
    }
};
