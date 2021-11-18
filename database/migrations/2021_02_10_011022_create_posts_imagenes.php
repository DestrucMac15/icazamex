<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsImagenes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts_imagenes', function (Blueprint $table) {
            $table->unsignedBigInteger('post_id')->nullable();
            $table->foreign('post_id')->references('id')->on('posts')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('imagen_id')->nullable();
            $table->foreign('imagen_id')->references('id')->on('imagenes')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts_imagenes');
    }
}
