<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use \App\Models\Tipo_das_pub;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@admin',
            'is_admin' => 1,
            'password' => Hash::make('123123123')
        ]);
        \App\Models\User::factory()->create([
            'name'=>'User',
            'email'=>'user@user.com',
            'is_admin'=> 0,
            'password'=> bcrypt('123456'),
        ]);

        \App\Models\Tipos_das_pub::create([
            'tip_tipo' => 'noticia',
        ]);
        \App\Models\Tipos_das_pub::create([
            'tip_tipo' => 'conteudo',
        ]);
    }
}
