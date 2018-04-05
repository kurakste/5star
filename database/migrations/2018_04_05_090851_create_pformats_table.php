<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePformatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pformats', function (Blueprint $table) {
            $table->increments('id');
            $table->String('format');
            $table->String('path');
            $table->integer('xpos');
            $table->integer('ypos');
            $table->integer('QRsize');
            $table->unsignedInteger('poster_id');
            $table->foreign('poster_id')->references('id')->on('posters')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pformats');
    }
}
