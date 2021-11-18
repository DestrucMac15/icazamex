<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AntiguedadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('antiguedad')->truncate();
        DB::table('antiguedad')->insert([
            ['titulo' => 'Año de construcción'],
            ['titulo' => 'A estrenar'],
            ['titulo' => 'En construcción'],
        ]);
    }
}
