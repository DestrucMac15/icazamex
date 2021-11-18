<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterInmueblesSetPrecioDesdeHasta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('inmuebles', function (Blueprint $table) {
            $table->double('precio_desde', 12, 2)->nullable();
            $table->double('precio_hasta', 12, 2)->nullable();
            $table->double('precio_x_m2', 12, 2)->nullable();
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
            $table->dropColumn(['precio_desde', 'precio_hasta', 'precio_x_m2']);
        });
    }
}
