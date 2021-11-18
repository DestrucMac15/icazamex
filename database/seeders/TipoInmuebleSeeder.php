<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoInmuebleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_inmueble')->truncate();
        DB::table('tipo_inmueble')->insert([
            ['titulo' => 'Bodega Comercial'],
            ['titulo' => 'Bodega Industrial'],
            ['titulo' => 'Casa'],
            ['titulo' => 'Casa con Uso de Suelo'],
            ['titulo' => 'Casa en Condominio'],
            ['titulo' => 'Departamento'],
            ['titulo' => 'Edificio'],
            ['titulo' => 'Local'],
            ['titulo' => 'Local Comercial'],
            ['titulo' => 'Local dentro de Centro Comercial'],
            ['titulo' => 'Nave Industrial'],
            ['titulo' => 'Oficina'],
            ['titulo' => 'Otro '],
            ['titulo' => 'Terreno'],
            ['titulo' => 'Terreno Comercial'],
            ['titulo' => 'Terreno Industrial'],
        ]);
    }
}
