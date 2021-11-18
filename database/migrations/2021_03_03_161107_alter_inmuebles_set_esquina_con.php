<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterInmueblesSetEsquinaCon extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('inmuebles', function (Blueprint $table) {
            $table->text('esquina_con')->nullable();
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
            $table->dropColumn(['esquina_con']);
        });
    }
}
