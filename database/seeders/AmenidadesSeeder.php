<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AmenidadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('amenidades')->insert([
            ['titulo' => 'Bodega'],
            ['titulo' => 'Salón de fiestas'],
            ['titulo' => 'Cuarto de TV'],
            ['titulo' => 'Sala de música y cine'],
            ['titulo' => 'Salón de usos multiples'],
            ['titulo' => 'Estudio'],
            ['titulo' => 'Gimnasio'],
            ['titulo' => 'Chimenea'],
            ['titulo' => 'Alberca'],
            ['titulo' => 'Jacuzzi'],
            ['titulo' => 'Cancha de squash'],
            ['titulo' => 'Cancha de futbol'],
        ]);
    }
}
