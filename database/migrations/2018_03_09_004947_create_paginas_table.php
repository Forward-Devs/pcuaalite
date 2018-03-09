<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaginasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paginas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tipo')->default(1);
            $table->string('slug')->nullable();
            $table->string('href')->nullable();
            $table->string('titulo_es')->nullable();
            $table->string('titulo_en')->nullable();
            $table->string('titulo_fr')->nullable();
            $table->text('contenido_es')->nullable();
            $table->text('contenido_en')->nullable();
            $table->text('contenido_fr')->nullable();
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paginas');
    }
}
