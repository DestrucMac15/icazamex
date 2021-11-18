<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInmueblesRestriccionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inmuebles_restricciones', function (Blueprint $table) {
            $table->unsignedBigInteger('inmueble_id')->nullable();
            $table->foreign('inmueble_id')->references('id')->on('inmuebles')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('restriccion_id')->nullable();
            $table->foreign('restriccion_id')->references('id')->on('restricciones')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inmuebles_restricciones');
    }
}
