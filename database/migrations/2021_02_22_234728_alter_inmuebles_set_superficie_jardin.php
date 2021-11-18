<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterInmueblesSetSuperficieJardin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('inmuebles', function (Blueprint $table) {
            $table->double('superficie_jardin')->nullable()->after('superficie_terreno');
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
            $table->dropColumn(['superficie_jardin']);
        });
    }
}
