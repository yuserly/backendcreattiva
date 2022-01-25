<?php

namespace Database\Seeders;

use App\Models\Categorias;
use Illuminate\Database\Seeder;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categorias::create(['nombre'     => 'Hosting', 'slug' => 'hosting']);
        Categorias::create(['nombre'     => 'Servidor VPS', 'slug' => 'servidor-vps']);
        Categorias::create(['nombre'     => 'Servidores Dedicados', 'slug' => 'servidores-dedicados']);
        Categorias::create(['nombre'     => 'Hosting Cloud', 'slug' => 'hosting-clouds']);
        Categorias::create(['nombre'     => 'Datacenter', 'slug' => 'datacenter']);
    }
}
