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
        Schema::create('produks_kategoris', function (Blueprint $table) {
             // Foreign Key Constraints
             $table->foreignUuid('produk_id')->references('id')->on('produks');
             $table->foreignUuid('kategori_id')->references('id')->on('kategoris');

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
        Schema::dropIfExists('produks_kategoris');
    }
};
