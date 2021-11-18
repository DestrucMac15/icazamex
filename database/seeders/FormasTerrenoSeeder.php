<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FormasTerrenoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('formas_terreno')->truncate();
        DB::table('formas_terreno')->insert([
            ['titulo' => 'Regular'],
            ['titulo' => 'Irregular'],
            ['titulo' => 'Plano'],
        ]);
    }
}
