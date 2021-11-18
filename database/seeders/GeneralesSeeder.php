<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GeneralesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('generales')->truncate();
        DB::table('generales')->insert([
            ['titulo' => 'Centros comerciales cercanos'],
            ['titulo' => 'Escuelas cercanas'],
            ['titulo' => 'Acceso discapacitados'],
            ['titulo' => 'Acceso tercera edad'],
            ['titulo' => 'Bodega'],
            ['titulo' => 'Circuito cerrado'],
            ['titulo' => 'Cuarto de servicio'],
            ['titulo' => 'Elevador'],
            ['titulo' => 'Sistema de ventilación '],
            ['titulo' => 'Cisterna'],
            ['titulo' => 'Calentador de agua'],
            ['titulo' => 'Servivios básicos'],
            ['titulo' => 'Amueblado'],
            ['titulo' => 'Asador'],
            ['titulo' => 'Aire acondicionado'],
            ['titulo' => 'Andenes para tráiler'],
            ['titulo' => 'Caseta de guardia'],
            ['titulo' => 'Zona industrial'],
            ['titulo' => 'Chimenea'],
            ['titulo' => 'Alberca'],
            ['titulo' => 'Jacuzzi'],
            ['titulo' => 'Cocina integral'],
            ['titulo' => 'Dentro de mercado'],
            ['titulo' => 'Drenaje'],
            ['titulo' => 'Área de juegos '],
            ['titulo' => 'Seguridad'],
            ['titulo' => 'Seguridad 24 hrs'],
            ['titulo' => 'Una sola planta'],
            ['titulo' => 'Parques'],
        ]);
    }
}
