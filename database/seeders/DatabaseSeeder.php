<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        // Disable Foreign key check for this connection before running seeders
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        // \App\Models\User::factory(10)->create();
        $this->call(CountriesSeeder::class);
        $this->call(TipoInmuebleSeeder::class);
        $this->call(EstadoConservacionSeeder::class);
        $this->call(GeneralesSeeder::class);
        $this->call(ExterioresSeeder::class);
        $this->call(AmenidadesSeeder::class);
        $this->call(RestriccionesSeeder::class);
        $this->call(TipoOperacionSeeder::class);
        $this->call(ServiciosSeeder::class);
        $this->call(FormasEntregaSeeder::class);
        $this->call(FormasTerrenoSeeder::class);
        $this->call(AntiguedadSeeder::class);

        // FOREIGN_KEY_CHECKS is supposed to only apply to a single
        // connection and reset itself but I like to explicitly
        // undo what I've done for clarity
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
