<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->unsignedInteger('vender_id')->nullable()->default(null);
            $table->String('name')->nullable();
            $table->String('email');
            $table->String('phone')->nullable()->default(null);
            $table->String('city')->nullable()->default(null);
            $table->string('password');
            $table->rememberToken('token');
            $table->boolean('active')->default(true);
            //$table->foreign('vender_id')->references('id')->on('venders')->onDelete('set null')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
