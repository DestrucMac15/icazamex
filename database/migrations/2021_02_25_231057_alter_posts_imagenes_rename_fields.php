<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterPostsImagenesRenameFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts_imagenes', function (Blueprint $table) {
            $table->renameColumn('imagen_id', 'multimedia_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts_imagenes', function (Blueprint $table) {
            $table->renameColumn('multimedia_id', 'imagen_id');
        });
    }
}
