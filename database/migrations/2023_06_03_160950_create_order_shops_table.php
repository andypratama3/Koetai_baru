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
        Schema::create('order_shops', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('user_id');
            $table->string('nama_penerima');
            $table->integer('nomor_telpon');
            $table->string('prod_id');
            $table->string('prod_qty');
            $table->string('prod_ukuran');
            $table->string('metode_pembayaran');
            $table->string('total');
            $table->longText('alamat')->nullable()->default('text');
            $table->longText('catatan')->nullable()->default('text');
            $table->enum('status', ['Unpaid','Paid']);
            $table->string('slug');
            $table->softDeletes();
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
        Schema::dropIfExists('order_shops');
    }
};





