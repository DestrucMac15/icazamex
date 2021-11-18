<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterInmueblesTableSetGenerales2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('inmuebles', function (Blueprint $table) {
            $table->integer('uso_suelo')->nullable();
            $table->integer('numero_frentes')->nullable();
            $table->string('ubicacion_manzana')->nullable();
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
            $table->dropColumn([
                'uso_suelo',
                'numero_frentes',
                'ubicacion_manzana',
            ]);
        });
    }
}
