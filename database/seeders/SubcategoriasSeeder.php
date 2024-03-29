<?php

namespace Database\Seeders;

use App\Models\Subcategorias;
use Illuminate\Database\Seeder;

class SubcategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Hosting 1
        Subcategorias::create(['nombre'     => 'Hosting SSD', 'slug' => 'hosting-ssd' ,'icono' => 'far fa-hdd', 'categoria_id' => 1, 'preseleccionado' => 4,
        'dominio'  => true,
        'ip' => false,
        'sistema_operativo'=> false,
        'administrable'=> false]);
        Subcategorias::create(['nombre'     => 'Hosting Amazon', 'slug' => 'hosting-amazon', 'icono' => 'fab fa-amazon', 'categoria_id' => 1, 'preseleccionado' => 4,'dominio'  => true,
        'ip' => false,
        'sistema_operativo'=> false,
        'administrable'=> false]);
        Subcategorias::create(['nombre'     => 'Hosting Windows', 'slug' => 'hosting-windows', 'icono' => 'fab fa-windows', 'categoria_id' => 1, 'preseleccionado' => 4,'dominio'  => true,
        'ip' => false,
        'sistema_operativo'=> false,
        'administrable'=> false]);
        Subcategorias::create(['nombre'     => 'Hosting Wordpress', 'slug' => 'hosting-wordpress', 'icono' => 'fab fa-wordpress', 'categoria_id' => 1, 'preseleccionado' => 4,'dominio'  => true,
        'ip' => false,
        'sistema_operativo'=> false,
        'administrable'=> false]);
        Subcategorias::create(['nombre'     => 'Hosting Reseller', 'slug' => 'hosting-reseller', 'icono' => 'fas fa-network-wired', 'categoria_id' => 1, 'preseleccionado' => 4,'dominio'  => true,
        'ip' => false,
        'sistema_operativo'=> false,
        'administrable'=> false]);
        Subcategorias::create(['nombre'     => 'Tienda Online', 'slug' => 'tienda-online', 'icono' => 'fas fa-network-wired', 'categoria_id' => 1, 'preseleccionado' => 1,'dominio'  => false,
        'ip' => false,
        'sistema_operativo'=> false,
        'administrable'=> false]);
        Subcategorias::create(['nombre'     => 'Certificado SSL', 'slug' => 'certificado-ssl', 'icono' => 'fas fa-network-wired', 'categoria_id' => 1, 'preseleccionado' => 4,'dominio'  => true,
        'ip' => false,
        'sistema_operativo'=> false,
        'administrable'=> false]);
        Subcategorias::create(['nombre'     => 'Instalación Certificado SSL', 'slug' => 'instalacion-certificado-ssl', 'icono' => 'fas fa-network-wired', 'categoria_id' => 1, 'preseleccionado' => 4,'dominio'  => true,
        'ip' => false,
        'sistema_operativo'=> false,
        'administrable'=> false]);
        //************



        //VPS 9
        Subcategorias::create(['nombre'     => 'Servidores VPS en Chile', 'slug' => 'servidores-vps-en-chile' ,'icono' => 'fab fa-linux', 'categoria_id' => 2, 'preseleccionado' => 4,'dominio'  => true,
        'ip' => false,
        'sistema_operativo'=> true,
        'administrable'=> true]);
        Subcategorias::create(['nombre'     => 'Servidores VPS Windows', 'slug' => 'servidores-vps-windows', 'icono' => 'fab fa-windows', 'categoria_id' => 2 , 'preseleccionado' => 4,'dominio'  => false,
        'ip' => false,
        'sistema_operativo'=> true,
        'administrable'=> false]);
        Subcategorias::create(['nombre'     => 'VPS Amazon Linux', 'slug' => 'vps-amazon-linux', 'icono' => 'fab fa-amazon', 'categoria_id' => 2 , 'preseleccionado' => 2,'dominio'  => false,
        'ip' => false,
        'sistema_operativo'=> true,
        'administrable'=> true]);
        Subcategorias::create(['nombre'     => 'VPS Linux Administrados', 'slug' => 'vps-linux-administrados', 'icono' => 'fab fa-linux', 'categoria_id' => 2 , 'preseleccionado' => 4,'dominio'  => true,
        'ip' => false,
        'sistema_operativo'=> true,
        'administrable'=> true]);
        Subcategorias::create(['nombre'     => 'VPS Amazon Windows', 'slug' => 'vps-amazon-windows', 'icono' => 'fab fa-windows', 'categoria_id' => 2 , 'preseleccionado' => 2,'dominio'  => false,
        'ip' => false,
        'sistema_operativo'=> true,
        'administrable'=> false]);
        Subcategorias::create(['nombre'     => 'Administración para VPS', 'slug' => 'administracion-para-vps', 'icono' => 'fas fa-user-shield', 'categoria_id' => 2 , 'preseleccionado' => 1]);
        Subcategorias::create(['nombre'     => 'Migración para VPS', 'slug' => 'migracion-para-vps', 'icono' => 'fas fa-user-shield', 'categoria_id' => 2 , 'preseleccionado' => 5]);
        //*************


        //Servidores Dedicados 16
        Subcategorias::create(['nombre'     => 'Servidores HP', 'slug' => 'servidores-hp' ,'icono' => 'fas fa-server', 'categoria_id' => 3, 'preseleccionado' => 7,'dominio'  => false,
        'ip' => false,
        'sistema_operativo'=> false,
        'administrable'=> true]);
        Subcategorias::create(['nombre'     => 'Servidores DELL', 'slug' => 'servidores-dell', 'icono' => 'fas fa-server', 'categoria_id' => 3, 'preseleccionado' => 7,'dominio'  => false,
        'ip' => false,
        'sistema_operativo'=> false,
        'administrable'=> true]);
        Subcategorias::create(['nombre'     => 'Administracion por evento', 'slug' => 'administracion-por-evento', 'icono' => 'fas fa-user-cog', 'categoria_id' => 3, 'preseleccionado' => 5]);
        Subcategorias::create(['nombre'     => 'Streaming Radio', 'slug' => 'streaming-radio', 'icono' => 'fab fa-soundcloud', 'categoria_id' => 3, 'preseleccionado' => 7]);
        //********************


        //Hosting Cloud 20
        Subcategorias::create(['nombre'     => 'Google Workspace', 'slug' => 'google-workspace', 'icono' => 'fab fa-google', 'categoria_id' => 4, 'preseleccionado' => 2,'dominio'  => true,
        'ip' => false,
        'sistema_operativo'=> false,
        'administrable'=> false]);
        Subcategorias::create(['nombre'     => 'Migracion Google Workspace', 'slug' => 'migracion-google-workspace' ,'icono' => 'fas fa-exchange-alt', 'categoria_id' => 4, 'preseleccionado' => 5]);
        Subcategorias::create(['nombre'     => 'Google Ads', 'slug' => 'google-ads', 'icono' => 'fab fa-google', 'categoria_id' => 4, 'preseleccionado' => 6,'dominio'  => true,
        'ip' => false,
        'sistema_operativo'=> false,
        'administrable'=> false]);
        Subcategorias::create(['nombre'     => 'Licencias Microsoft', 'slug' => 'licencias-microsoft', 'icono' => 'fab fa-windows', 'categoria_id' => 4, 'preseleccionado' => 5]);
        Subcategorias::create(['nombre'     => 'Licencias Microsoft 365', 'slug' => 'licencias-microsoft-365', 'icono' => 'fab fa-windows', 'categoria_id' => 4, 'preseleccionado' => 2]);
        Subcategorias::create(['nombre'     => 'Cotizar Licencias Microsoft', 'slug' => 'cotizar-licencias-microsoft', 'icono' => 'fab fa-windows', 'categoria_id' => 4, 'preseleccionado' => 1]);
        Subcategorias::create(['nombre'     => 'Soporte Microsoft 365', 'slug' => 'soporte-microsoft-365', 'icono' => 'fab fa-windows', 'categoria_id' => 4, 'preseleccionado' => 5]);
        Subcategorias::create(['nombre'     => 'Almacenamiento Adicional Google Workspace', 'slug' => 'almacenamiento-adicional-google-workspace', 'icono' => 'fab fa-google-drive', 'categoria_id' => 4, 'preseleccionado' => 1]);
        //**************

        //Datacenter 28
        Subcategorias::create(['nombre'     => 'Housing', 'slug' => 'housing' ,'icono' => 'fas fa-user-lock', 'categoria_id' =>5, 'preseleccionado' => 2]);
        Subcategorias::create(['nombre'     => 'Licencias Cpanel', 'slug' => 'licencias-cpanel', 'icono' => 'fab fa-cpanel', 'categoria_id' =>5, 'preseleccionado' => 1,'dominio'  => false,
        'ip' => true,
        'sistema_operativo'=> false,
        'administrable'=> false]);
        Subcategorias::create(['nombre'     => 'Licencias Imunify360', 'slug' => 'licencias-imunify360', 'icono' => 'fas fa-shield-alt', 'categoria_id' =>5, 'preseleccionado' => 1,'dominio'  => false,
        'ip' => true,
        'sistema_operativo'=> false,
        'administrable'=> false]);
        Subcategorias::create(['nombre'     => 'Registro de Dominios', 'slug' => 'registro-de-dominios', 'icono' => 'fas fa-network-wired', 'categoria_id' =>5, 'preseleccionado' => 4]);
        Subcategorias::create(['nombre'     => 'Cloud Backup', 'slug' => 'cloud-backup', 'icono' => 'fas fa-database', 'categoria_id' =>5, 'preseleccionado' => 3]);
        //************

    }
}
