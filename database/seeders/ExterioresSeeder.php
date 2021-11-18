<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExterioresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('exteriores')->truncate();
        DB::table('exteriores')->insert([
            ['titulo' => 'Asador'],
            ['titulo' => 'Cancha de tenis'],
            ['titulo' => 'Cancha de squash'],
            ['titulo' => 'Estacionamiento de visitas'],
            ['titulo' => 'Báscula'],
            ['titulo' => 'Jardín'],
            ['titulo' => 'Balcón'],
            ['titulo' => 'Roof garden'],
            ['titulo' => 'Terraza'],
        ]);
    }
}
