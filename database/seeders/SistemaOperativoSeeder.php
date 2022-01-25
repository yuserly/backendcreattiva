<?php

namespace Database\Seeders;

use App\Models\SistemaOperativo;
use Illuminate\Database\Seeder;

class SistemaOperativoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SistemaOperativo::create(['nombre'=> 'Centos' ,'icono' => 'fab fa-centos', 'tipo' => 'linux']);
        SistemaOperativo::create(['nombre'=> 'Debian' ,'icono' => 'fab fa-deviantart', 'tipo' => 'linux']);
        SistemaOperativo::create(['nombre'=> 'Ubuntu' ,'icono' => 'fab fa-ubuntu', 'tipo' => 'linux']);
    }
}
