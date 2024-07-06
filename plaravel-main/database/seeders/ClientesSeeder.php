<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

use Illuminate\Support\Facades\DB;


class ClientesSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('clientes')->insert([
            ['rut'=>'12345678-9','nombre'=>'Sebastian Mori', 'fecha_nac'=>Carbon::parse('2000/07/14')],
            ['rut'=>'98765432-1','nombre'=>'Carla Pujadas', 'fecha_nac'=>Carbon::parse('1982/03/21')],
            ['rut'=>'20389025-k','nombre'=>'Joaquin Martinez', 'fecha_nac'=>Carbon::parse('2004/03/21')],
        ]);
    }
}
