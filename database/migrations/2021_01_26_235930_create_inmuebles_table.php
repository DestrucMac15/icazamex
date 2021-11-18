<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInmueblesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inmuebles', function (Blueprint $table) {
            $table->id();
            $table->string('inmueble', 255)->nullable();

            $table->timestamp('fecha')->nullable();
            $table->string('titulo', 255)->nullable();
            $table->text('descripcion')->nullable();

            $table->smallInteger('venta')->nullable();
            $table->string('moneda_venta', 10)->nullable();
            $table->decimal('precio_venta', 12, 2)->nullable();
            $table->decimal('mantenimiento_venta', 12, 2)->nullable();

            $table->smallInteger('renta')->nullable();
            $table->string('moneda_renta', 10)->nullable();
            $table->decimal('precio_renta', 12, 2)->nullable();
            $table->decimal('mantenimiento_renta', 12, 2)->nullable();

            $table->decimal('precio', 12, 2)->nullable();
            $table->decimal('precio_matenimiento', 12, 2)->nullable();

            $table->boolean('mostrar_precios')->nullable();
            $table->integer('recamaras')->nullable();
            $table->integer('banios')->nullable();
            $table->integer('medios_banios')->nullable();
            $table->integer('estacionamientos')->nullable();

            $table->string('superficie', 255)->nullable();//m2 o hectareas (ha)?
            $table->double('superficie_contruida')->nullable();
            $table->double('superficie_terreno')->nullable();

            $table->integer('largo')->nullable();
            $table->integer('frente')->nullable();

            $table->string('antiguedad', 100)->nullable();
            $table->date('antiguedad_fecha')->nullable();
            $table->integer('antiguedad_anios')->nullable();

            $table->integer('pisos')->nullable();
            $table->integer('piso_actual')->nullable();

            $table->string('llave', 100)->nullable();
            $table->string('pais', 100)->nullable();

            $table->integer('estado_id')->nullable();
            $table->integer('municipio_id')->nullable();
            $table->integer('localidad_id')->nullable();

            $table->string('colonia', 100)->nullable();
            $table->string('calle')->nullable();
            $table->string('interior')->nullable();
            $table->string('exterior')->nullable();
            $table->integer('codigo_postal')->nullable();
            $table->string('esquina')->nullable();
            $table->boolean('mapa')->nullable();

            $table->string('general', 1000)->nullable();
            $table->string('recreacion', 500)->nullable();

            $table->string('ruta')->nullable();
            $table->string('estatus')->nullable();

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('tipo_inmueble_id')->nullable();
            $table->foreign('tipo_inmueble_id')->references('id')->on('tipo_inmueble')->onUpdate('cascade')->onDelete('cascade');

            $table->boolean('ocultar_direccion')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inmuebles');
    }
}
