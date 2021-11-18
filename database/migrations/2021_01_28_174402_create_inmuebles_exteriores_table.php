<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInmueblesExterioresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inmuebles_exteriores', function (Blueprint $table) {
            $table->unsignedBigInteger('inmueble_id')->nullable();
            $table->foreign('inmueble_id')->references('id')->on('inmuebles')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('exterior_id')->nullable();
            $table->foreign('exterior_id')->references('id')->on('exteriores')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inmuebles_exteriores');
    }
}
