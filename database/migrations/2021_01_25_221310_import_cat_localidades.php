<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ImportCatLocalidades extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //el cataloogo de localidades se debe importar manualmente
        //ini_set('memory_limit', '-1');
        //DB::unprepared( file_get_contents('./cat_localidad.sql') );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('localidades');
        Schema::dropIfExists('municipios');
        Schema::dropIfExists('estados');
    }
}
