<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterInmueblesSetDesarrollosFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('inmuebles', function (Blueprint $table) {
            $table->string('roof_garden')->nullable();//estos campos se utilizan unicamente en desarrollos
            $table->double('metraje_desde')->nullable();
            $table->double('metraje_hasta')->nullable();
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
            //
        });
    }
}
