<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInversionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inversiones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('inmueble_id')->nullable();
            $table->foreign('inmueble_id')->references('id')->on('inmuebles')->onUpdate('cascade')->onDelete('cascade');
            $table->string('titulo')->nullable();
            $table->integer('habitaciones')->nullable();
            $table->double('banios')->nullable();
            $table->integer('balcones')->nullable();
            $table->integer('estacionamientos')->nullable();
            $table->string('nivel')->nullable();
            $table->double('m2')->nullable();
            $table->double('patio')->nullable();
            $table->decimal('precio', 12, 2)->nullable();
            $table->string('estatus')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inversiones');
    }
}
