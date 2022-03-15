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
        SubcategoriasHasPeriodos::create(['preseleccionado' => 1, 'subcategoria_id' => 1, 'periodo_id' => 4]);

        //Hosting amazon
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 2, 'periodo_id' => 2]);
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 2, 'periodo_id' => 3]);
        SubcategoriasHasPeriodos::create(['preseleccionado' => 1, 'subcategoria_id' => 2, 'periodo_id' => 4]);

        //Hosting Windows
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 3, 'periodo_id' => 2]);
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 3, 'periodo_id' => 3]);
        SubcategoriasHasPeriodos::create(['preseleccionado' => 1, 'subcategoria_id' => 3, 'periodo_id' => 4]);

        //Hosting Wordpress
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 4, 'periodo_id' => 2]);
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 4, 'periodo_id' => 3]);
        SubcategoriasHasPeriodos::create(['preseleccionado' => 1, 'subcategoria_id' => 4, 'periodo_id' => 4]);

        //Hosting Reseller
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 5, 'periodo_id' => 2]);
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 5, 'periodo_id' => 3]);
        SubcategoriasHasPeriodos::create(['preseleccionado' => 1, 'subcategoria_id' => 5, 'periodo_id' => 4]);

        //Tienda Online
        SubcategoriasHasPeriodos::create(['preseleccionado' => 1, 'subcategoria_id' => 6, 'periodo_id' => 1]);
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 6, 'periodo_id' => 2]);
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 6, 'periodo_id' => 3]);

        //Certificado SSL
        SubcategoriasHasPeriodos::create(['preseleccionado' => 1, 'subcategoria_id' => 7, 'periodo_id' => 2]);

        //Instalación Certificado SSL
        SubcategoriasHasPeriodos::create(['preseleccionado' => 1, 'subcategoria_id' => 8, 'periodo_id' => 5]);

        //Servidor VPS en Chile
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 9, 'periodo_id' => 1]);
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 9, 'periodo_id' => 7]);
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 9, 'periodo_id' => 2]);
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 9, 'periodo_id' => 3]);
        SubcategoriasHasPeriodos::create(['preseleccionado' => 1, 'subcategoria_id' => 9, 'periodo_id' => 4]);

        //Servidor VPS Windows
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 10, 'periodo_id' => 1]);
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 10, 'periodo_id' => 7]);
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 10, 'periodo_id' => 2]);
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 10, 'periodo_id' => 3]);
        SubcategoriasHasPeriodos::create(['preseleccionado' => 1, 'subcategoria_id' => 10, 'periodo_id' => 4]);

        //Servidor Linux Administrado
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 12, 'periodo_id' => 1]);
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 12, 'periodo_id' => 7]);
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 12, 'periodo_id' => 2]);
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 12, 'periodo_id' => 3]);
        SubcategoriasHasPeriodos::create(['preseleccionado' => 1, 'subcategoria_id' => 12, 'periodo_id' => 4]);

        //Servidor Amazon Linux
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 11, 'periodo_id' => 1]);
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 11, 'periodo_id' => 6]);
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 11, 'periodo_id' => 7]);
        SubcategoriasHasPeriodos::create(['preseleccionado' => 1, 'subcategoria_id' => 11, 'periodo_id' => 2]);

        //VPS Amazon windows
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 13, 'periodo_id' => 1]);
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 13, 'periodo_id' => 6]);
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 13, 'periodo_id' => 7]);
        SubcategoriasHasPeriodos::create(['preseleccionado' => 1, 'subcategoria_id' => 13, 'periodo_id' => 2]);

        //Administracion para VPS
        SubcategoriasHasPeriodos::create(['preseleccionado' => 1, 'subcategoria_id' => 14, 'periodo_id' => 1]);
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 14, 'periodo_id' => 7]);
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 14, 'periodo_id' => 2]);
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 14, 'periodo_id' => 3]);

        //Migración VPS
        SubcategoriasHasPeriodos::create(['preseleccionado' => 1, 'subcategoria_id' => 15, 'periodo_id' => 5]);

        //Servidor HP
        SubcategoriasHasPeriodos::create(['preseleccionado' => 1, 'subcategoria_id' => 16, 'periodo_id' => 7]);
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 16, 'periodo_id' => 2]);
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 16, 'periodo_id' => 3]);
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 16, 'periodo_id' => 4]);

        //Servidor DELL
        SubcategoriasHasPeriodos::create(['preseleccionado' => 1, 'subcategoria_id' => 17, 'periodo_id' => 7]);
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 17, 'periodo_id' => 2]);
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 17, 'periodo_id' => 3]);
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 17, 'periodo_id' => 4]);

        //Administtacion por evento
        SubcategoriasHasPeriodos::create(['preseleccionado' => 1, 'subcategoria_id' => 18, 'periodo_id' => 5]);

        //Streaming Radio
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 19, 'periodo_id' => 1]);
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 19, 'periodo_id' => 6]);
        SubcategoriasHasPeriodos::create(['preseleccionado' => 1, 'subcategoria_id' => 19, 'periodo_id' => 7]);
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 19, 'periodo_id' => 2]);

        //Google Workspace
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 20, 'periodo_id' => 1]);
        SubcategoriasHasPeriodos::create(['preseleccionado' => 1, 'subcategoria_id' => 20, 'periodo_id' => 2]);

        //Migración Google Workspace
        SubcategoriasHasPeriodos::create(['preseleccionado' => 1, 'subcategoria_id' => 21, 'periodo_id' => 5]);

        //Google Ads
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 22, 'periodo_id' => 1]);
        SubcategoriasHasPeriodos::create(['preseleccionado' => 1, 'subcategoria_id' => 22, 'periodo_id' => 6]);

        //Licencias Microsoft
        SubcategoriasHasPeriodos::create(['preseleccionado' => 1, 'subcategoria_id' => 23, 'periodo_id' => 5]);

        //Licencias Microsoft 365
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 24, 'periodo_id' => 1]);
        SubcategoriasHasPeriodos::create(['preseleccionado' => 1, 'subcategoria_id' => 24, 'periodo_id' => 2]);

        //Soporte Microsoft 365
        SubcategoriasHasPeriodos::create(['preseleccionado' => 1, 'subcategoria_id' => 26, 'periodo_id' => 5]);

        //Almacenamiento adicional google workspace
        SubcategoriasHasPeriodos::create(['preseleccionado' => 1, 'subcategoria_id' => 27, 'periodo_id' => 1]);

        //Housing
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 28, 'periodo_id' => 1]);
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 28, 'periodo_id' => 7]);
        SubcategoriasHasPeriodos::create(['preseleccionado' => 1, 'subcategoria_id' => 28, 'periodo_id' => 2]);
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 28, 'periodo_id' => 3]);

        //Licencias Cpanel
        SubcategoriasHasPeriodos::create(['preseleccionado' => 1, 'subcategoria_id' => 29, 'periodo_id' => 1]);

        //Licencias Imunify360
        SubcategoriasHasPeriodos::create(['preseleccionado' => 1, 'subcategoria_id' => 30, 'periodo_id' => 1]);

        //CloudBackup
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 32, 'periodo_id' => 1]);
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 32, 'periodo_id' => 7]);
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 32, 'periodo_id' => 2]);
        SubcategoriasHasPeriodos::create(['preseleccionado' => 1, 'subcategoria_id' => 32, 'periodo_id' => 3]);

        //Dominios
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 31, 'periodo_id' => 2]);
        SubcategoriasHasPeriodos::create(['subcategoria_id' => 31, 'periodo_id' => 3]);
        SubcategoriasHasPeriodos::create(['preseleccionado' => 31, 'subcategoria_id' => 31, 'periodo_id' => 4]);



    }
}
