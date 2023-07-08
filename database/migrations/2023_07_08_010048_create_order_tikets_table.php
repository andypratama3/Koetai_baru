<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_tikets', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nama');
            $table->string('user_id');
            $table->string('tiket_id');
            $table->string('email');
            $table->string('jumlah');
            $table->string('order_id');
            $table->string('status');
            $table->string('transaction_id');
            $table->string('payment_type');
            $table->string('payment_code')->nullable();
            $table->string('gross_amount');
            $table->string('pdf_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_tikets');
    }
};
