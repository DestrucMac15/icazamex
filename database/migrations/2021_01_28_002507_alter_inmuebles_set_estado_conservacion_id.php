<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterInmueblesSetEstadoConservacionId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('inmuebles', function (Blueprint $table) {
            $table->unsignedBigInteger('estado_conservacion_id')->nullable();
            $table->foreign('estado_conservacion_id')->references('id')->on('estado_conservacion')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('inmuebles', function (Blueprint $table) {
            $table->dropForeign('estado_conservacion_id');
            $table->dropColumn(['estado_conservacion_id']);
        });
    }
}
