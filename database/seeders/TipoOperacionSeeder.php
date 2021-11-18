<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoOperacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_operacion')->truncate();
        DB::table('tipo_operacion')->insert([
            ['titulo' => 'Venta', 'tipo' => 'propiedades'],
            ['titulo' => 'Renta', 'tipo' => 'propiedades'],
            ['titulo' => 'Renta Temporal', 'tipo' => 'propiedades'],
            ['titulo' => 'Venta', 'tipo' => 'desarrollos'],
            ['titulo' => 'Preventa', 'tipo' => 'desarrollos'],
        ]);
    }
}
