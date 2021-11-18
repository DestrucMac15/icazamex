<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FormasEntregaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('formas_entrega')->truncate();
        DB::table('formas_entrega')->insert([
            ['titulo' => 'Obra negra'],
            ['titulo' => 'Obra gris'],
            ['titulo' => 'Obra blanca'],
        ]);
    }
}
