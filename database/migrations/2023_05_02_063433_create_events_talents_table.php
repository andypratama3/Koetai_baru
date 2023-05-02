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
        Schema::create('events_talents', function (Blueprint $table) {
            // Foreign Key Constraints
            $table->foreignUuid('event_id')->references('id')->on('events');
            $table->foreignUuid('talent_id')->references('id')->on('talents');

            // Setting The Primary Keys
            $table->primary(['event_id', 'talent_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events_talents');
    }
};
