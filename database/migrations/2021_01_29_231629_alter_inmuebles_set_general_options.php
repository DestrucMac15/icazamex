<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterInmueblesSetGeneralOptions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('inmuebles', function (Blueprint $table) {
            $table->integer('metros_altura')->nullable();
            $table->double('metros2_bodega')->nullable();
            $table->double('metros2_oficina')->nullable();
            $table->double('soporte_piso')->nullable();
            $table->double('iluminacion')->nullable();
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
                'metros_altura',
                'metros2_bodega',
                'metros2_oficina',
                'soporte_piso',
                'iluminacion'
            ]);
        });
    }
}
