<?php

namespace Database\Seeders;

use App\Models\TipoProducto;
use Illuminate\Database\Seeder;

class TipoProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoProducto::create(['tipo'     => 'hosting']);
        TipoProducto::create(['tipo'     => 'vps']);
        TipoProducto::create(['tipo'     => 'dominio']);
        TipoProducto::create(['tipo'     => 'licencias cpanel']);
    }
}
