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
        Schema::create('kategori_produks', function (Blueprint $table) {
        // Foreign Key Constraints
        $table->foreignUuid('produk_id')->references('id')->on('events');
        $table->foreignUuid('kategori_id')->references('id')->on('talents');

        // Setting The Primary Keys
        $table->primary(['produk_id', 'kategori_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kategori_produks');
    }
};
