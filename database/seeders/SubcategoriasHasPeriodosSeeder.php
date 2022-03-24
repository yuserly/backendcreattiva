<?php

namespace Database\Seeders;

use App\Models\SubcategoriasHasPeriodos;
use Illuminate\Database\Seeder;

class SubcategoriasHasPeriodosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Hosting SSH
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 1, 'periodo_id' => 2]);
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 1, 'periodo_id' => 3]);


        //Hosting amazon
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 2, 'periodo_id' => 2]);
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 2, 'periodo_id' => 3]);

        //Hosting Windows
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 3, 'periodo_id' => 2]);
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 3, 'periodo_id' => 3]);

        //Hosting Wordpress
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 4, 'periodo_id' => 2]);
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 4, 'periodo_id' => 3]);

        //Hosting Reseller
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 5, 'periodo_id' => 2]);
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 5, 'periodo_id' => 3]);

        //Tienda Online
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 6, 'periodo_id' => 2]);
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 6, 'periodo_id' => 3]);

        //Servidor VPS en Chile
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 9, 'periodo_id' => 1]);
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 9, 'periodo_id' => 7]);
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 9, 'periodo_id' => 2]);
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 9, 'periodo_id' => 3]);

        //Servidor VPS Windows
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 10, 'periodo_id' => 1]);
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 10, 'periodo_id' => 7]);
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 10, 'periodo_id' => 2]);
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 10, 'periodo_id' => 3]);

        //Servidor Linux Administrado
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 12, 'periodo_id' => 1]);
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 12, 'periodo_id' => 7]);
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 12, 'periodo_id' => 2]);
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 12, 'periodo_id' => 3]);

        //Servidor Amazon Linux
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 11, 'periodo_id' => 1]);
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 11, 'periodo_id' => 6]);
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 11, 'periodo_id' => 7]);

        //VPS Amazon windows
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 13, 'periodo_id' => 1]);
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 13, 'periodo_id' => 6]);
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 13, 'periodo_id' => 7]);

        //Administracion para VPS
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 14, 'periodo_id' => 7]);
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 14, 'periodo_id' => 2]);
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 14, 'periodo_id' => 3]);

        //Migración VPS

        //Servidor HP
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 16, 'periodo_id' => 2]);
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 16, 'periodo_id' => 3]);
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 16, 'periodo_id' => 4]);

        //Servidor DELL
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 17, 'periodo_id' => 2]);
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 17, 'periodo_id' => 3]);
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 17, 'periodo_id' => 4]);

        //Administtacion por evento

        //Streaming Radio
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 19, 'periodo_id' => 1]);
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 19, 'periodo_id' => 6]);
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 19, 'periodo_id' => 2]);

        //Google Workspace
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 20, 'periodo_id' => 1]);

        //Google Ads
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 22, 'periodo_id' => 1]);

        //Licencias Microsoft 365
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 24, 'periodo_id' => 1]);

        //Housing
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 28, 'periodo_id' => 1]);
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 28, 'periodo_id' => 7]);
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 28, 'periodo_id' => 3]);

        //CloudBackup
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 32, 'periodo_id' => 1]);
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 32, 'periodo_id' => 7]);
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 32, 'periodo_id' => 2]);

        //Dominios
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 31, 'periodo_id' => 2]);
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 31, 'periodo_id' => 3]);

    }
}
