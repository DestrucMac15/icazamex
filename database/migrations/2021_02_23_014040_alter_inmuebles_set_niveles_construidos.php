<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterInmueblesSetNivelesConstruidos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('inmuebles', function (Blueprint $table) {
            $table->integer('niveles_construidos')->nullable();
            $table->integer('numero_oficinas')->nullable();
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
            $table->dropColumn(['niveles_construidos', 'numero_oficinas']);
        });
    }
}
