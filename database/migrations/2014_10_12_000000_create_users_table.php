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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username');
            $table->string('email')->unique();
            $table->string('phone');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('balance')->default(0);
            $table->string('amount')->default(0);
            $table->string('account_number')->unique();
            $table->string('account_type')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('address')->nullable();
            $table->string('gender')->nullable();
            $table->string('Tranfer_pin')->nullable();
            $table->string('otp')->nullable();
            $table->string('Nationality')->nullable();
            $table->string('next_kin_relation')->nullable();
            $table->string('next_kin_address')->nullable();
            $table->string('profile_image')->nullable();
            $table->string('status')->default('pending');
            $table->string('transaction_status')->default('active');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
