<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleEstacionamientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_estacionamientos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nota')->nullable();
            $table->boolean('salida');

            $table->dateTime('fecha_entrada');
            $table->dateTime('fecha_salida')->nullable();

            $table->unsignedInteger('espacio_id');
            $table->foreign('espacio_id')->references('id')->on('espacio_estacionamientos');

            $table->unsignedInteger('vehiculo_id');
            $table->foreign('vehiculo_id')->references('id')->on('vehiculos');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_estacionamientos');
    }
}
