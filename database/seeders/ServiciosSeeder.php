<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiciosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('servicios')->truncate();
        DB::table('servicios')->insert([
            ['titulo' => 'Gas'],
            ['titulo' => 'Aire acondicionado'],
            ['titulo' => 'Cisterna'],
            ['titulo' => 'Área de juegos infantiles'],
            ['titulo' => 'Calefacción'],
            ['titulo' => 'Gimnasio'],
            ['titulo' => 'Seguridad privada'],
            ['titulo' => 'Calentador de agua'],
            ['titulo' => 'Línea telefónica'],
            ['titulo' => 'Planta eléctrica'],
            ['titulo' => 'Cancha de tenis'],
            ['titulo' => 'Sistema de ventilación'],
            ['titulo' => 'Servicios básicos (agua/luz)'],
            ['titulo' => 'Conmutador'],
            ['titulo' => 'Seguridad contra incendios'],
            ['titulo' => 'Generador eléctrico'],
        ]);
    }
}
