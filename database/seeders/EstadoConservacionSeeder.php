<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadoConservacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estado_conservacion')->truncate();
        DB::table('estado_conservacion')->insert([
            ['titulo' => 'Excelente'],
            ['titulo' => 'Bueno'],
            ['titulo' => 'Regular'],
            ['titulo' => 'Malo'],
            ['titulo' => 'Remodelado'],
            ['titulo' => 'Para Remodelar'],
        ]);
    }
}
