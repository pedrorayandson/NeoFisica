<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipos_das_pubs')->insert([
            'tip_tipo' => "noticia",
        ]);

        DB::table('tipos_das_pubs')->insert([
            'tip_tipo' => "conteudo",
        ]);
    }
}
