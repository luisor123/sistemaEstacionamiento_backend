<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEspacioEstacionamientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('espacio_estacionamientos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo')->nullable();
            $table->string('nombre');
            $table->string('descripcion')->nullable();

            $table->unsignedInteger('estacionamiento_id');
            $table->foreign('estacionamiento_id')->references('id')->on('estacionamientos');

            $table->unsignedInteger('estado_id');
            $table->foreign('estado_id')->references('id')->on('estado_espacio_estacionamientos');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('espacio_estacionamientos');
    }
}
