<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PerfilesSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('perfiles')->insert([
            ['nombre'=>'Administrador'],
            ['nombre'=>'Ejecutivo'],
        ]);
    }
}
