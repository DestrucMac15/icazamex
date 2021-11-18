<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInmueblesImagenesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inmuebles_imagenes', function (Blueprint $table) {
            $table->unsignedBigInteger('inmueble_id')->nullable();
            $table->foreign('inmueble_id')->references('id')->on('inmuebles')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('imagen_id')->nullable();
            $table->foreign('imagen_id')->references('id')->on('imagenes')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inmuebles_imagenes');
    }
}
