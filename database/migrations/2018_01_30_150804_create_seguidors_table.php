<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeguidorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seguidores', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned(); // Crearemos una referencia para el Usuario
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('follow_id')->unsigned(); // Crearemos una referencia para el Usuario
            $table->foreign('follow_id')->references('id')->on('users');
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
        Schema::dropIfExists('seguidores');
    }
}
