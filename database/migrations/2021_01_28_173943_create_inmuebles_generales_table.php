<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInmueblesGeneralesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inmuebles_generales', function (Blueprint $table) {
            $table->unsignedBigInteger('inmueble_id')->nullable();
            $table->foreign('inmueble_id')->references('id')->on('inmuebles')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('general_id')->nullable();
            $table->foreign('general_id')->references('id')->on('generales')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inmuebles_generales');
    }
}
