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
        Schema::create('tranfers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('tra_id');
            $table->string('transaction_id');
            $table->string('sender_account_number');
            $table->string('reciever_account_number');
            $table->string('reciever_name');
            $table->string('reciever_bank');
            $table->string('swift')->nullable();
            $table->string('iban')->nullable();
            $table->string('bic')->nullable();
            $table->string('otp')->nullable();
            $table->string('currency');
            $table->string('amount')->default(0);
            $table->string('fund_tranfer');
            $table->string('type')->default('Debit');
            $table->string('service_charge')->default(0.00);
            $table->string('message')->nullable();
            $table->string('status')->default('pending');
            $table->string('pin_confirmed')->default(0);
            $table->foreign('user_id')
            ->references('id')->on('users')
            ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tranfers');
    }
};
