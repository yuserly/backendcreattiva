<?php

namespace Database\Seeders;

use App\Models\CarateristicassProductos;
use App\Models\Productos;
use Illuminate\Database\Seeder;

class ProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //Hosting SSD
       $producto = Productos::create(['nombre'=> 'Hosting Persona',
                                    'slug' => 'hosting-persona',
                                    'meta_title' => 'Hosting Persona',
                                    'meta_description' => 'Hosting Persona' ,
                                    'meta_key' => 'Hosting' ,
                                    'precio' => 5900,
                                    'subcategoria_id' => 1,
                                    'tipo_producto_id' => 1]);

        $caracteristicas = [
            ["nombre" => 'Almacenaminto SSD', "capacidad" => '10 GB'],
            ["nombre" => 'Base de Datos', "capacidad" => '1'],
            ["nombre" => 'Subdominios', "capacidad" => '1'],
            ["nombre" => 'Dominio en Parking', "capacidad" => '1'],
            ["nombre" => 'Cuentas de correo electrónico', "capacidad" => '10'],
            ["nombre" => 'Almacenaminto Backup', "capacidad" => '30 GB'],
            ["nombre" => 'Correos permitidos', "capacidad" => '600 por hora'],
            ["nombre" => 'Certificado SSL Gratuito', "capacidad" => ''],
            ["nombre" => 'Transferencia ilimitada', "capacidad" => ''],
        ];

        foreach ($caracteristicas as $key => $value) {

            CarateristicassProductos::create([
                'nombre' => $value["nombre"],
                'capacidad' => $value["capacidad"],
                'producto_id' => $producto->id_producto
            ]);
        }


        $producto = Productos::create(['nombre'=> 'Hosting Emprendedor',
                                    'slug' => 'hosting-emprendedor',
                                    'meta_title' => 'Hosting Emprendedor',
                                    'meta_description' => 'Hosting Emprendedor' ,
                                    'meta_key' => 'Hosting' ,
                                    'precio' => 10000,
                                    'subcategoria_id' => 1,
                                    'tipo_producto_id' => 1]);

        $caracteristicas = [
            ["nombre" => 'Almacenaminto SSD', "capacidad" => '25 GB'],
            ["nombre" => 'Base de Datos', "capacidad" => 'Ilimitado'],
            ["nombre" => 'Subdominios', "capacidad" => '3'],
            ["nombre" => 'Dominio en Parking', "capacidad" => '3'],
            ["nombre" => 'Cuentas de correo electrónico', "capacidad" => 'Ilimitado'],
            ["nombre" => 'Almacenaminto Backup', "capacidad" => '75 GB'],
            ["nombre" => 'Correos permitidos', "capacidad" => '800 por hora'],
            ["nombre" => 'Certificado SSL Gratuito', "capacidad" => ''],
            ["nombre" => 'Transferencia ilimitada', "capacidad" => ''],
        ];

        foreach ($caracteristicas as $key => $value) {

            CarateristicassProductos::create([
                'nombre' => $value["nombre"],
                'capacidad' => $value["capacidad"],
                'producto_id' => $producto->id_producto
            ]);
        }

        //*************


        // Hosting Wordpress

        $producto = Productos::create(['nombre'=> 'Hosting Wordpress 5G',
                                    'slug' => 'hosting-wordpress-5G',
                                    'meta_title' => 'Hosting Wordpress 5G',
                                    'meta_description' => 'Hosting Wordpress 5G' ,
                                    'meta_key' => 'Hosting, wordpress' ,
                                    'precio' => 15000,
                                    'subcategoria_id' => 4,
                                    'tipo_producto_id' => 1]);

        $caracteristicas = [
            ["nombre" => 'Almacenaminto SSD', "capacidad" => '5 GB'],
            ["nombre" => 'Dominios', "capacidad" => '1'],
            ["nombre" => 'Cuentas de correo electrónico', "capacidad" => '10'],
            ["nombre" => 'Almacenaminto Backup', "capacidad" => '75 GB'],
            ["nombre" => 'Correos permitidos', "capacidad" => '800 por hora'],
            ["nombre" => 'Certificado SSL Gratuito', "capacidad" => ''],
            ["nombre" => 'Transferencia ilimitada', "capacidad" => ''],
        ];

        foreach ($caracteristicas as $key => $value) {

            CarateristicassProductos::create([
                'nombre' => $value["nombre"],
                'capacidad' => $value["capacidad"],
                'producto_id' => $producto->id_producto
            ]);
        }

         $producto = Productos::create(['nombre'=> 'Hosting Wordpress 10G',
         'slug' => 'hosting-wordpressIlimitado0g',
         'meta_title' => 'Hosting Wordpress 10G',
         'meta_description' => 'Hosting Wordpress 10G' ,
         'meta_key' => 'Hosting, wordpress' ,
         'precio' => 20000,
         'subcategoria_id' => 4,
         'tipo_producto_id' => 1]);

        $caracteristicas = [
        ["nombre" => 'Almacenaminto SSD', "capacidad" => '10 GB'],
        ["nombre" => 'Dominios', "capacidad" => '1'],
        ["nombre" => 'Cuentas de correo electrónico', "capacidad" => '20'],
        ["nombre" => 'Almacenaminto Backup', "capacidad" => '75 GB'],
        ["nombre" => 'Correos permitidos', "capacidad" => '800 por hora'],
        ["nombre" => 'Certificado SSL Gratuito', "capacidad" => ''],
        ["nombre" => 'Transferencia ilimitada', "capacidad" => ''],
        ];

        foreach ($caracteristicas as $key => $value) {

            CarateristicassProductos::create([
                'nombre' => $value["nombre"],
                'capacidad' => $value["capacidad"],
                'producto_id' => $producto->id_producto
            ]);
        }

        //************************



        // Hosting Amazon

        $producto = Productos::create(['nombre'=> 'Hosting en Amazon 16GB SSD',
        'slug' => 'hosting-en-amazonIlimitado6gb-ssd',
        'meta_title' => 'Hosting en Amazon 16GB SSD',
        'meta_description' => 'Hosting en Amazon 16GB SSD' ,
        'meta_key' => 'Hosting, amazon' ,
        'precio' => 40000,
        'subcategoria_id' => 2,
        'tipo_producto_id' => 1]);

       $caracteristicas = [
       ["nombre" => 'Almacenaminto', "capacidad" => '16 GB'],
       ["nombre" => 'Base de Datos', "capacidad" => 'Ilimitado'],
       ["nombre" => 'Dominios', "capacidad" => '1'],
       ["nombre" => 'Almacenaminto Backup', "capacidad" => '48 GB'],
       ["nombre" => 'Transferencia mensual', "capacidad" => '100GB']
       ];

       foreach ($caracteristicas as $key => $value) {

           CarateristicassProductos::create([
               'nombre' => $value["nombre"],
               'capacidad' => $value["capacidad"],
               'producto_id' => $producto->id_producto
           ]);
       }


       // producto 6

       $producto = Productos::create(['nombre'=> 'Hosting en Amazon 32GB SSD',
       'slug' => 'hosting-en-amazon-32gb-ssd',
       'meta_title' => 'Hosting en Amazon 32GB SSD',
       'meta_description' => 'Hosting en Amazon 32GB SSD' ,
       'meta_key' => 'Hosting, amazon' ,
       'precio' => 40000,
       'subcategoria_id' => 2,
       'tipo_producto_id' => 1]);

      $caracteristicas = [
      ["nombre" => 'Almacenaminto', "capacidad" => '32 GB'],
      ["nombre" => 'Base de Datos', "capacidad" => 'Ilimitado'],
      ["nombre" => 'Dominios', "capacidad" => '5'],
      ["nombre" => 'Almacenaminto Backup', "capacidad" => '96 GB'],
      ["nombre" => 'Transferencia mensual', "capacidad" => '200GB']
      ];

      foreach ($caracteristicas as $key => $value) {

          CarateristicassProductos::create([
              'nombre' => $value["nombre"],
              'capacidad' => $value["capacidad"],
              'producto_id' => $producto->id_producto
          ]);
      }

      //**************

       // Hosting Windows

       $producto = Productos::create(['nombre'=> 'Hosting Windows Persona',
       'slug' => 'hosting-windows-persona',
       'meta_title' => 'Hosting Windows Persona',
       'meta_description' => 'Hosting Windows Persona' ,
       'meta_key' => 'Hosting, windows' ,
       'precio' => 50000,
       'subcategoria_id' => 3,
       'tipo_producto_id' => 1]);

      $caracteristicas = [
      ["nombre" => 'Almacenaminto', "capacidad" => '10 GB'],
      ["nombre" => 'Base de Datos', "capacidad" => '1'],
      ["nombre" => 'Dominios', "capacidad" => '1'],
      ["nombre" => 'Subominios', "capacidad" => '1'],
      ["nombre" => 'Control Span', "capacidad" => ''],
      ["nombre" => 'Soporte 24x7x365 en Chile', "capacidad" => ''],
      ];

      foreach ($caracteristicas as $key => $value) {

          CarateristicassProductos::create([
              'nombre' => $value["nombre"],
              'capacidad' => $value["capacidad"],
              'producto_id' => $producto->id_producto
          ]);
      }


      $producto = Productos::create(['nombre'=> 'Hosting Windows Emprendedor',
      'slug' => 'hosting-windows-emprendedor',
      'meta_title' => 'Hosting Windows Emprendedor',
      'meta_description' => 'Hosting Windows Emprendedor' ,
      'meta_key' => 'Hosting, windows' ,
      'precio' => 50000,
      'subcategoria_id' => 3,
      'tipo_producto_id' => 1]);

     $caracteristicas = [
     ["nombre" => 'Almacenaminto', "capacidad" => '25 GB'],
     ["nombre" => 'Base de Datos', "capacidad" => '2'],
     ["nombre" => 'Dominios', "capacidad" => '3'],
     ["nombre" => 'Subominios', "capacidad" => '3'],
     ["nombre" => 'Control Span', "capacidad" => ''],
     ["nombre" => 'Soporte 24x7x365 en Chile', "capacidad" => ''],
     ];

     foreach ($caracteristicas as $key => $value) {

         CarateristicassProductos::create([
             'nombre' => $value["nombre"],
             'capacidad' => $value["capacidad"],
             'producto_id' => $producto->id_producto
         ]);
     }

     //***************

     //Hosting Reseller

     $producto = Productos::create(['nombre'=> 'Hosting Reseller Developer',
     'slug' => 'hosting-reseller-developer',
     'meta_title' => 'Hosting Reseller Developer',
     'meta_description' => 'Hosting Reseller Developer' ,
     'meta_key' => 'Hosting, reseller' ,
     'precio' => 50000,
     'subcategoria_id' => 5,
     'tipo_producto_id' => 1]);

    $caracteristicas = [
    ["nombre" => 'Cuentas de Hosting', "capacidad" => '25'],
    ["nombre" => 'Espacio web cuentas de hosting', "capacidad" => '50 GB'],
    ["nombre" => 'Transferencia de Datos Mensuales', "capacidad" => '500 GB'],
    ["nombre" => 'IP Dedicada Incluida para la cuenta principal', "capacidad" => ''],
    ["nombre" => 'Backup adicionales', "capacidad" => '150GB']
    ];

    foreach ($caracteristicas as $key => $value) {

        CarateristicassProductos::create([
            'nombre' => $value["nombre"],
            'capacidad' => $value["capacidad"],
            'producto_id' => $producto->id_producto
        ]);
    }


    $producto = Productos::create(['nombre'=> 'Hosting Reseller Emprendedor',
    'slug' => 'hosting-reseller-emprendedor',
    'meta_title' => 'Hosting Reseller Emprendedor',
    'meta_description' => 'Hosting Reseller Emprendedor' ,
    'meta_key' => 'Hosting, reseller' ,
    'precio' => 50000,
    'subcategoria_id' => 5,
    'tipo_producto_id' => 1]);

   $caracteristicas = [
   ["nombre" => 'Cuentas de Hosting', "capacidad" => '40'],
   ["nombre" => 'Espacio web cuentas de hosting', "capacidad" => '80 GB'],
   ["nombre" => 'Transferencia de Datos Mensuales', "capacidad" => '700 GB'],
   ["nombre" => 'IP Dedicada Incluida para la cuenta principal', "capacidad" => ''],
   ["nombre" => 'Backup adicionales', "capacidad" => '240GB']
   ];

   foreach ($caracteristicas as $key => $value) {

       CarateristicassProductos::create([
           'nombre' => $value["nombre"],
           'capacidad' => $value["capacidad"],
           'producto_id' => $producto->id_producto
       ]);
   }

   //***************

   // Tienda Online

   $producto = Productos::create(['nombre'=> 'Ecommerce Plus',
     'slug' => 'ecommerce-plus',
     'meta_title' => 'Ecommerce Plus',
     'meta_description' => 'Ecommerce Plus' ,
     'meta_key' => 'Hosting, ecommerce' ,
     'precio' => 43900,
     'subcategoria_id' => 6,
     'tipo_producto_id' => 1]);

    $caracteristicas = [
    ["nombre" => 'Cuentas de Hosting', "capacidad" => '25'],
    ["nombre" => 'Espacio web cuentas de hosting', "capacidad" => '50 GB'],
    ["nombre" => 'Transferencia de Datos Mensuales', "capacidad" => '500 GB'],
    ["nombre" => 'IP Dedicada Incluida para la cuenta principal', "capacidad" => ''],
    ["nombre" => 'Backup adicionales', "capacidad" => '150GB']
    ];

    foreach ($caracteristicas as $key => $value) {

        CarateristicassProductos::create([
            'nombre' => $value["nombre"],
            'capacidad' => $value["capacidad"],
            'producto_id' => $producto->id_producto
        ]);
    }

    $producto = Productos::create(['nombre'=> 'Ecommerce Pro',
     'slug' => 'ecommerce-pro',
     'meta_title' => 'Ecommerce Pro',
     'meta_description' => 'Ecommerce Pro' ,
     'meta_key' => 'Hosting, ecommerce' ,
     'precio' => 46900,
     'subcategoria_id' => 6,
     'tipo_producto_id' => 1]);

    $caracteristicas = [
    ["nombre" => 'Cuentas de Hosting', "capacidad" => '25'],
    ["nombre" => 'Espacio web cuentas de hosting', "capacidad" => '50 GB'],
    ["nombre" => 'Transferencia de Datos Mensuales', "capacidad" => '500 GB'],
    ["nombre" => 'IP Dedicada Incluida para la cuenta principal', "capacidad" => ''],
    ["nombre" => 'Backup adicionales', "capacidad" => '150GB']
    ];

    foreach ($caracteristicas as $key => $value) {

        CarateristicassProductos::create([
            'nombre' => $value["nombre"],
            'capacidad' => $value["capacidad"],
            'producto_id' => $producto->id_producto
        ]);
    }

    $producto = Productos::create(['nombre'=> 'Ecommerce Premium',
     'slug' => 'ecommerce-premium',
     'meta_title' => 'Ecommerce Premium',
     'meta_description' => 'Ecommerce Premium' ,
     'meta_key' => 'Hosting, ecommerce' ,
     'precio' => 56900,
     'subcategoria_id' => 6,
     'tipo_producto_id' => 1]);

    $caracteristicas = [
    ["nombre" => 'Cuentas de Hosting', "capacidad" => '25'],
    ["nombre" => 'Espacio web cuentas de hosting', "capacidad" => '50 GB'],
    ["nombre" => 'Transferencia de Datos Mensuales', "capacidad" => '500 GB'],
    ["nombre" => 'IP Dedicada Incluida para la cuenta principal', "capacidad" => ''],
    ["nombre" => 'Backup adicionales', "capacidad" => '150GB']
    ];

    foreach ($caracteristicas as $key => $value) {

        CarateristicassProductos::create([
            'nombre' => $value["nombre"],
            'capacidad' => $value["capacidad"],
            'producto_id' => $producto->id_producto
        ]);
    }


   //***************


    //Certificado SSL


    $producto = Productos::create(['nombre'=> 'Sectigo Positive SSL Certificate',
     'slug' => 'sectigo-positive-ssl-certificate',
     'meta_title' => 'Sectigo Positive SSL Certificate',
     'meta_description' => 'Sectigo Positive SSL Certificate' ,
     'meta_key' => 'Certificado, ssl' ,
     'precio' => 12500,
     'subcategoria_id' => 7,
     'tipo_producto_id' => 1]);

    $caracteristicas = [
    ["nombre" => 'Cuentas de Hosting', "capacidad" => '25'],
    ["nombre" => 'Espacio web cuentas de hosting', "capacidad" => '50 GB'],
    ["nombre" => 'Transferencia de Datos Mensuales', "capacidad" => '500 GB'],
    ["nombre" => 'IP Dedicada Incluida para la cuenta principal', "capacidad" => ''],
    ["nombre" => 'Backup adicionales', "capacidad" => '150GB']
    ];

    foreach ($caracteristicas as $key => $value) {

        CarateristicassProductos::create([
            'nombre' => $value["nombre"],
            'capacidad' => $value["capacidad"],
            'producto_id' => $producto->id_producto
        ]);
    }

     $producto = Productos::create(['nombre'=> 'Sectigo SSL',
     'slug' => 'sectigo-ssl',
     'meta_title' => 'Sectigo SSL',
     'meta_description' => 'Sectigo SSL' ,
     'meta_key' => 'Certificado, ssl' ,
     'precio' => 11500,
     'subcategoria_id' => 7,
     'tipo_producto_id' => 1]);

    $caracteristicas = [
    ["nombre" => 'Cuentas de Hosting', "capacidad" => '25'],
    ["nombre" => 'Espacio web cuentas de hosting', "capacidad" => '50 GB'],
    ["nombre" => 'Transferencia de Datos Mensuales', "capacidad" => '500 GB'],
    ["nombre" => 'IP Dedicada Incluida para la cuenta principal', "capacidad" => ''],
    ["nombre" => 'Backup adicionales', "capacidad" => '150GB']
    ];

    foreach ($caracteristicas as $key => $value) {

        CarateristicassProductos::create([
            'nombre' => $value["nombre"],
            'capacidad' => $value["capacidad"],
            'producto_id' => $producto->id_producto
        ]);
    }

    //**************

    //Instalación Certificado SSL

    $producto = Productos::create(['nombre'=> 'Instalacion de certificado ssl - Servidores Linux externos',
     'slug' => 'instalacion-certificado-ssl-servidores-linux-externos',
     'meta_title' => 'Instalacion de certificado ssl - Servidores Linux externos',
     'meta_description' => 'Instalacion de certificado ssl - Servidores Linux externos' ,
     'meta_key' => 'Certificado, ssl' ,
     'precio' => 14500,
     'subcategoria_id' => 8,
     'tipo_producto_id' => 1]);

    $caracteristicas = [
    ["nombre" => 'Cuentas de Hosting', "capacidad" => '25'],
    ["nombre" => 'Espacio web cuentas de hosting', "capacidad" => '50 GB'],
    ["nombre" => 'Transferencia de Datos Mensuales', "capacidad" => '500 GB'],
    ["nombre" => 'IP Dedicada Incluida para la cuenta principal', "capacidad" => ''],
    ["nombre" => 'Backup adicionales', "capacidad" => '150GB']
    ];

    foreach ($caracteristicas as $key => $value) {

        CarateristicassProductos::create([
            'nombre' => $value["nombre"],
            'capacidad' => $value["capacidad"],
            'producto_id' => $producto->id_producto
        ]);
    }

    $producto = Productos::create(['nombre'=> 'Instalacion de certificado ssl - Servidores Windows externos',
     'slug' => 'instalacion-certificado-ssl-servidores-windows-externos',
     'meta_title' => 'Instalacion de certificado ssl - Servidores Windows externos',
     'meta_description' => 'Instalacion de certificado ssl - Servidores Windows externos' ,
     'meta_key' => 'Certificado, ssl' ,
     'precio' => 12500,
     'subcategoria_id' => 8,
     'tipo_producto_id' => 1]);

    $caracteristicas = [
    ["nombre" => 'Cuentas de Hosting', "capacidad" => '25'],
    ["nombre" => 'Espacio web cuentas de hosting', "capacidad" => '50 GB'],
    ["nombre" => 'Transferencia de Datos Mensuales', "capacidad" => '500 GB'],
    ["nombre" => 'IP Dedicada Incluida para la cuenta principal', "capacidad" => ''],
    ["nombre" => 'Backup adicionales', "capacidad" => '150GB']
    ];

    foreach ($caracteristicas as $key => $value) {

        CarateristicassProductos::create([
            'nombre' => $value["nombre"],
            'capacidad' => $value["capacidad"],
            'producto_id' => $producto->id_producto
        ]);
    }

    //***************************


    // Servidor VPS en Chile

    $producto = Productos::create(['nombre'=> 'Servidor VPS Linux 1 GB',
    'slug' => 'servidor-vps-linuxIlimitadogb',
    'meta_title' => 'Servidor VPS Linux 1 GB',
    'meta_description' => 'Servidor VPS Linux 1 GB' ,
    'meta_key' => 'servidor, vps, linux' ,
    'precio' => 50000,
    'subcategoria_id' => 9,
    'tipo_producto_id' => 2]);

        $caracteristicas = [
            ["nombre" => 'Memoria RAM', "capacidad" => '1 GB'],
            ["nombre" => 'Enlace Nacional', "capacidad" => '1 Gbps'],
            ["nombre" => 'CPU', "capacidad" => '1 Core'],
            ["nombre" => 'Enlace Internacional', "capacidad" => '50 MB'],
            ["nombre" => 'Transferencia Mensual', "capacidad" => 'Ilimitado'],
            ["nombre" => 'Acceso ROOT', "capacidad" => 'Si']
        ];

        foreach ($caracteristicas as $key => $value) {

            CarateristicassProductos::create([
                'nombre' => $value["nombre"],
                'capacidad' => $value["capacidad"],
                'producto_id' => $producto->id_producto
            ]);
        }

        $producto = Productos::create(['nombre'=> 'Servidor VPS Linux 2 GB',
                                        'slug' => 'servidor-vps-linux-2gb',
                                        'meta_title' => 'Servidor VPS Linux 2 GB',
                                        'meta_description' => 'Servidor VPS Linux 2 GB' ,
                                        'meta_key' => 'servidor, vps, linux' ,
                                        'precio' => 50000,
                                        'subcategoria_id' => 9,
                                        'tipo_producto_id' => 2]);

        $caracteristicas = [
            ["nombre" => 'Memoria RAM', "capacidad" => '2 GB'],
            ["nombre" => 'Enlace Nacional', "capacidad" => '1 Gbps'],
            ["nombre" => 'CPU', "capacidad" => '1 Core'],
            ["nombre" => 'Enlace Internacional', "capacidad" => '50 MB'],
            ["nombre" => 'Transferencia Mensual', "capacidad" => 'Ilimitado'],
            ["nombre" => 'Acceso ROOT', "capacidad" => 'Si']
        ];

        foreach ($caracteristicas as $key => $value) {

            CarateristicassProductos::create([
                'nombre' => $value["nombre"],
                'capacidad' => $value["capacidad"],
                'producto_id' => $producto->id_producto
            ]);
        }

    //**************

    //Servidor VPS Windows

        $producto = Productos::create(['nombre'=> 'Servidor VPS Windows 2 GB',
                                        'slug' => 'servidor-vps-windows-2gb',
                                        'meta_title' => 'Servidor VPS Windows 2 GB',
                                        'meta_description' => 'Servidor VPS Windows 2 GB' ,
                                        'meta_key' => 'servidor, vps, Windows' ,
                                        'precio' => 50000,
                                        'subcategoria_id' => 10,
                                        'tipo_producto_id' => 2]);

        $caracteristicas = [
            ["nombre" => 'Memoria RAM', "capacidad" => '2 GB'],
            ["nombre" => 'Enlace Nacional', "capacidad" => '1 Gbps'],
            ["nombre" => 'CPU', "capacidad" => '2 Core'],
            ["nombre" => 'Enlace Internacional', "capacidad" => '50 MB'],
            ["nombre" => 'Transferencia Mensual', "capacidad" => 'Ilimitado'],
            ["nombre" => 'Acceso ROOT', "capacidad" => 'Si']
        ];

        foreach ($caracteristicas as $key => $value) {

            CarateristicassProductos::create([
                'nombre' => $value["nombre"],
                'capacidad' => $value["capacidad"],
                'producto_id' => $producto->id_producto
            ]);
        }

         $producto = Productos::create(['nombre'=> 'Servidor VPS Windows 4 GB',
                                        'slug' => 'servidor-vps-windows-4gb',
                                        'meta_title' => 'Servidor VPS Windows 4 GB',
                                        'meta_description' => 'Servidor VPS Windows 4 GB' ,
                                        'meta_key' => 'servidor, vps, Windows' ,
                                        'precio' => 50000,
                                        'subcategoria_id' => 10,
                                        'tipo_producto_id' => 2]);

        $caracteristicas = [
            ["nombre" => 'Memoria RAM', "capacidad" => '4 GB'],
            ["nombre" => 'Enlace Nacional', "capacidad" => '1 Gbps'],
            ["nombre" => 'CPU', "capacidad" => '2 Core'],
            ["nombre" => 'Enlace Internacional', "capacidad" => '50 MB'],
            ["nombre" => 'Transferencia Mensual', "capacidad" => 'Ilimitado'],
            ["nombre" => 'Acceso ROOT', "capacidad" => 'Si']
        ];

        foreach ($caracteristicas as $key => $value) {

            CarateristicassProductos::create([
                'nombre' => $value["nombre"],
                'capacidad' => $value["capacidad"],
                'producto_id' => $producto->id_producto
            ]);
        }

    //***********

    //Servidor VPS Linux Amazon
        $producto = Productos::create(['nombre'=> 'Servidor VPS Linux 2 GB',
                                        'slug' => 'servidor-vps-linux-2gb',
                                        'meta_title' => 'Servidor VPS Linux 2 GB',
                                        'meta_description' => 'Servidor VPS Linux 2 GB' ,
                                        'meta_key' => 'servidor, vps, Linux' ,
                                        'precio' => 50000,
                                        'subcategoria_id' => 11,
                                        'tipo_producto_id' => 2]);

        $caracteristicas = [
            ["nombre" => 'Memoria RAM', "capacidad" => '2 GB'],
            ["nombre" => 'Enlace Nacional', "capacidad" => '1 Gbps'],
            ["nombre" => 'CPU', "capacidad" => '2 Core'],
            ["nombre" => 'Enlace Internacional', "capacidad" => '50 MB'],
            ["nombre" => 'Transferencia Mensual', "capacidad" => 'Ilimitado'],
            ["nombre" => 'Acceso ROOT', "capacidad" => 'Si']
        ];

        foreach ($caracteristicas as $key => $value) {

            CarateristicassProductos::create([
                'nombre' => $value["nombre"],
                'capacidad' => $value["capacidad"],
                'producto_id' => $producto->id_producto
            ]);
        }


         $producto = Productos::create(['nombre'=> 'Servidor VPS Linux 4 GB',
                                        'slug' => 'servidor-vps-linux-4gb',
                                        'meta_title' => 'Servidor VPS Linux 4 GB',
                                        'meta_description' => 'Servidor VPS Linux 4 GB' ,
                                        'meta_key' => 'servidor, vps, Linux' ,
                                        'precio' => 50000,
                                        'subcategoria_id' => 11,
                                        'tipo_producto_id' => 2]);

        $caracteristicas = [
            ["nombre" => 'Memoria RAM', "capacidad" => '4 GB'],
            ["nombre" => 'Enlace Nacional', "capacidad" => '1 Gbps'],
            ["nombre" => 'CPU', "capacidad" => '2 Core'],
            ["nombre" => 'Enlace Internacional', "capacidad" => '50 MB'],
            ["nombre" => 'Transferencia Mensual', "capacidad" => 'Ilimitado'],
            ["nombre" => 'Acceso ROOT', "capacidad" => 'Si']
        ];

        foreach ($caracteristicas as $key => $value) {

            CarateristicassProductos::create([
                'nombre' => $value["nombre"],
                'capacidad' => $value["capacidad"],
                'producto_id' => $producto->id_producto
            ]);
        }

    //************

        //VPS Linux Administrador

        $producto = Productos::create(['nombre'=> 'VPS Linux Administrado 2GB RAM 30GB en disco',
                                        'slug' => 'vps-linux-administrador-2gb-ram',
                                        'meta_title' => 'VPS Linux Administrado 2GB RAM 30GB en disco',
                                        'meta_description' => 'VPS Linux Administrado 2GB RAM 30GB en disco' ,
                                        'meta_key' => 'servidor, vps, Linux, administrado' ,
                                        'precio' => 37000,
                                        'subcategoria_id' => 12,
                                        'tipo_producto_id' => 2]);

        $caracteristicas = [
            ["nombre" => 'Memoria RAM', "capacidad" => '2 GB'],
            ["nombre" => 'Enlace Nacional', "capacidad" => '1 Gbps'],
            ["nombre" => 'CPU', "capacidad" => '1 Core'],
            ["nombre" => 'Enlace Internacional', "capacidad" => '50 MB'],
            ["nombre" => 'Transferencia Mensual', "capacidad" => 'Ilimitado'],
            ["nombre" => 'Acceso ROOT', "capacidad" => 'Si']
        ];

        foreach ($caracteristicas as $key => $value) {

            CarateristicassProductos::create([
                'nombre' => $value["nombre"],
                'capacidad' => $value["capacidad"],
                'producto_id' => $producto->id_producto
            ]);
        }

        $producto = Productos::create(['nombre'=> 'VPS Linux Administrado 4GB RAM 50GB en disco',
                                        'slug' => 'vps-linux-administrador-4gb-ram',
                                        'meta_title' => 'VPS Linux Administrado 4GB RAM 50GB en disco',
                                        'meta_description' => 'VPS Linux Administrado 4GB RAM 50GB en disco' ,
                                        'meta_key' => 'servidor, vps, Linux, administrado' ,
                                        'precio' => 39000,
                                        'subcategoria_id' => 12,
                                        'tipo_producto_id' => 2]);

        $caracteristicas = [
            ["nombre" => 'Memoria RAM', "capacidad" => '4 GB'],
            ["nombre" => 'Enlace Nacional', "capacidad" => '1 Gbps'],
            ["nombre" => 'CPU', "capacidad" => '2 Core'],
            ["nombre" => 'Enlace Internacional', "capacidad" => '50 MB'],
            ["nombre" => 'Transferencia Mensual', "capacidad" => 'Ilimitado'],
            ["nombre" => 'Acceso ROOT', "capacidad" => 'Si']
        ];

        foreach ($caracteristicas as $key => $value) {

            CarateristicassProductos::create([
                'nombre' => $value["nombre"],
                'capacidad' => $value["capacidad"],
                'producto_id' => $producto->id_producto
            ]);
        }

        //********************** */

        //VPS Amazon Windows

        $producto = Productos::create(['nombre'=> 'VPS Windows en Amazon 1GB RAM',
                                        'slug' => 'vps-windows-amazon-1gb-ram',
                                        'meta_title' => 'VPS Windows en Amazon 1GB RAM',
                                        'meta_description' => 'VPS Windows en Amazon 1GB RAM' ,
                                        'meta_key' => 'servidor, vps, windows, amazon' ,
                                        'precio' => 39700,
                                        'subcategoria_id' => 13,
                                        'tipo_producto_id' => 2]);

        $caracteristicas = [
            ["nombre" => 'Memoria RAM', "capacidad" => '1 GB'],
            ["nombre" => 'Licencia', "capacidad" => 'Windows Server'],
            ["nombre" => 'CPU', "capacidad" => '1 Core'],
            ["nombre" => 'Administración', "capacidad" => 'Si'],
            ["nombre" => 'Transferencia Mensual', "capacidad" => '2 TB'],
            ["nombre" => 'Acceso ROOT', "capacidad" => 'Si']
        ];

        foreach ($caracteristicas as $key => $value) {

            CarateristicassProductos::create([
                'nombre' => $value["nombre"],
                'capacidad' => $value["capacidad"],
                'producto_id' => $producto->id_producto
            ]);
        }

        $producto = Productos::create(['nombre'=> 'VPS Windows en Amazon 4GB RAM',
                                        'slug' => 'vps-windows-amazon-4gb-ram',
                                        'meta_title' => 'VPS Windows en Amazon 4GB RAM',
                                        'meta_description' => 'VPS Windows en Amazon 4GB RAM' ,
                                        'meta_key' => 'servidor, vps, windows, amazon' ,
                                        'precio' => 42000,
                                        'subcategoria_id' => 13,
                                        'tipo_producto_id' => 2]);

        $caracteristicas = [
            ["nombre" => 'Memoria RAM', "capacidad" => '4 GB'],
            ["nombre" => 'Licencia', "capacidad" => 'Windows Server'],
            ["nombre" => 'CPU', "capacidad" => '2 Core'],
            ["nombre" => 'Administración', "capacidad" => 'Si'],
            ["nombre" => 'Transferencia Mensual', "capacidad" => '4 TB'],
            ["nombre" => 'Acceso ROOT', "capacidad" => 'Si']
        ];

        foreach ($caracteristicas as $key => $value) {

            CarateristicassProductos::create([
                'nombre' => $value["nombre"],
                'capacidad' => $value["capacidad"],
                'producto_id' => $producto->id_producto
            ]);
        }

        //********************** */

        //Administración para VPS

        $producto = Productos::create(['nombre'=> 'Administracion para VPS Linux',
                                        'slug' => 'administracion-para-vps-linux',
                                        'meta_title' => 'Administracion para VPS Linux',
                                        'meta_description' => 'Administracion para VPS Linux' ,
                                        'meta_key' => 'servidor, vps, linux, administracion' ,
                                        'precio' => 30000,
                                        'subcategoria_id' => 14,
                                        'tipo_producto_id' => 2]);

        $caracteristicas = [
            ["nombre" => 'Soporte técnico', "capacidad" => '24/7'],
            ["nombre" => 'Asistencia', "capacidad" => 'Asistencia por correo electrónico y por teléfono todos los días durante las 24 horas']
        ];

        foreach ($caracteristicas as $key => $value) {

            CarateristicassProductos::create([
                'nombre' => $value["nombre"],
                'capacidad' => $value["capacidad"],
                'producto_id' => $producto->id_producto
            ]);
        }

        //********************** */

        //Migracion VPS

        $producto = Productos::create(['nombre'=> 'Migracion de Servidor VPS en horario de oficina',
                                        'slug' => 'migracion-vps-horario-oficina',
                                        'meta_title' => 'Migracion de Servidor VPS en horario de oficina',
                                        'meta_description' => 'Migracion de Servidor VPS en horario de oficina' ,
                                        'meta_key' => 'servidor, vps, linux, administracion' ,
                                        'precio' => 30000,
                                        'subcategoria_id' => 15,
                                        'tipo_producto_id' => 2]);

        $caracteristicas = [
            ["nombre" => 'Soporte técnico', "capacidad" => '24/7'],
            ["nombre" => 'Asistencia', "capacidad" => 'Asistencia por correo electrónico y por teléfono todos los días durante las 24 horas']
        ];

        foreach ($caracteristicas as $key => $value) {

            CarateristicassProductos::create([
                'nombre' => $value["nombre"],
                'capacidad' => $value["capacidad"],
                'producto_id' => $producto->id_producto
            ]);
        }

        $producto = Productos::create(['nombre'=> 'Migracion de Servidor VPS fuera del horario de oficina',
                                        'slug' => 'migracion-vps-fuera-horario-oficina',
                                        'meta_title' => 'Migracion de Servidor VPS fuera del horario de oficina',
                                        'meta_description' => 'Migracion de Servidor VPS fuera del horario de oficina' ,
                                        'meta_key' => 'servidor, vps, linux, administracion' ,
                                        'precio' => 40000,
                                        'subcategoria_id' => 15,
                                        'tipo_producto_id' => 2]);

        $caracteristicas = [
            ["nombre" => 'Soporte técnico', "capacidad" => '24/7'],
            ["nombre" => 'Asistencia', "capacidad" => 'Asistencia por correo electrónico y por teléfono todos los días durante las 24 horas']
        ];

        foreach ($caracteristicas as $key => $value) {

            CarateristicassProductos::create([
                'nombre' => $value["nombre"],
                'capacidad' => $value["capacidad"],
                'producto_id' => $producto->id_producto
            ]);
        }
        //***************



        // dominios
        $producto = Productos::create(['nombre'=> 'Registro de dominios com',
        'slug' => 'registro-dominios-com',
        'meta_title' => 'Registro de dominios com',
        'meta_description' => 'Registro de dominios com' ,
        'meta_key' => '.com, .net, .org' ,
        'precio' => 100,
        'subcategoria_id' => 31,
        'tipo_producto_id' => 3]);

        $producto = Productos::create(['nombre'=> 'Registro de dominios net',
        'slug' => 'registro-dominios-net',
        'meta_title' => 'Registro de dominios net',
        'meta_description' => 'Registro de dominios net' ,
        'meta_key' => '.com, .net, .org' ,
        'precio' => 200,
        'subcategoria_id' => 31,
        'tipo_producto_id' => 3]);

        $producto = Productos::create(['nombre'=> 'Registro de dominios org',
        'slug' => 'registro-dominios-org',
        'meta_title' => 'Registro de dominios org',
        'meta_description' => 'Registro de dominios org' ,
        'meta_key' => '.com, .net, .org' ,
        'precio' => 300,
        'subcategoria_id' => 31,
        'tipo_producto_id' => 3]);

        $producto = Productos::create(['nombre'=> 'Registro de dominios store',
        'slug' => 'registro-dominios-store',
        'meta_title' => 'Registro de dominios store',
        'meta_description' => 'Registro de dominios store' ,
        'meta_key' => '.com, .net, .org' ,
        'precio' => 400,
        'subcategoria_id' => 31,
        'tipo_producto_id' => 3]);

        $producto = Productos::create(['nombre'=> 'Registro de dominios digital',
        'slug' => 'registro-dominios-digital',
        'meta_title' => 'Registro de dominios digital',
        'meta_description' => 'Registro de dominios digital' ,
        'meta_key' => '.com, .net, .org' ,
        'precio' => 500,
        'subcategoria_id' => 31,
        'tipo_producto_id' => 3]);

        $producto = Productos::create(['nombre'=> 'Registro de dominios cl',
        'slug' => 'registro-dominios-cl',
        'meta_title' => 'Registro de dominios cl',
        'meta_description' => 'Registro de dominios cl' ,
        'meta_key' => '.com, .net, .org' ,
        'precio' => 600,
        'subcategoria_id' => 31,
        'tipo_producto_id' => 3]);

        // licencias cpanel

        $producto = Productos::create(['nombre'=> 'cPanel Admin 5',
        'slug' => 'cpanel-admin-5',
        'meta_title' => 'cPanel Admin 5',
        'meta_description' => 'cPanel Admin 5',
        'meta_key' => 'cpanel',
        'precio' => 7000,
        'subcategoria_id' => 29,
        'tipo_producto_id' => 4]);

        $producto = Productos::create(['nombre'=> 'cPanel Pro 30',
        'slug' => 'cpanel-pro-30',
        'meta_title' => 'cPanel Pro 30',
        'meta_description' => 'cPanel Pro 30' ,
        'meta_key' => 'cpanel' ,
        'precio' => 10000,
        'subcategoria_id' => 29,
        'tipo_producto_id' => 4]);

        $producto = Productos::create(['nombre'=> 'cPanel Premiere 100',
        'slug' => 'cpanel-premiere-100',
        'meta_title' => 'cPanel Premiere 100',
        'meta_description' => 'cPanel Premiere 100' ,
        'meta_key' => 'cpanel' ,
        'precio' => 15000,
        'subcategoria_id' => 29,
        'tipo_producto_id' => 4]);

        $producto = Productos::create(['nombre'=> 'cPanel Premiere 125',
        'slug' => 'cpanel-premiere-125',
        'meta_title' => 'cPanel Premiere 125',
        'meta_description' => 'cPanel Premiere 125' ,
        'meta_key' => 'cpanel' ,
        'precio' => 20000,
        'subcategoria_id' => 29,
        'tipo_producto_id' => 4]);

        $producto = Productos::create(['nombre'=> 'cPanel Premiere 150',
        'slug' => 'cpanel-premiere-150',
        'meta_title' => 'cPanel Premiere 150',
        'meta_description' => 'cPanel Premiere 150' ,
        'meta_key' => 'cpanel' ,
        'precio' => 25000,
        'subcategoria_id' => 29,
        'tipo_producto_id' => 4]);

        $producto = Productos::create(['nombre'=> 'cPanel Premiere 175',
        'slug' => 'cpanel-premiere-175',
        'meta_title' => 'cPanel Premiere 175',
        'meta_description' => 'cPanel Premiere 175' ,
        'meta_key' => 'cpanel' ,
        'precio' => 30000,
        'subcategoria_id' => 29,
        'tipo_producto_id' => 4]);

        $producto = Productos::create(['nombre'=> 'cPanel Premiere 200',
        'slug' => 'cpanel-premiere-200',
        'meta_title' => 'cPanel Premiere 200',
        'meta_description' => 'cPanel Premiere 200' ,
        'meta_key' => 'cpanel' ,
        'precio' => 35000,
        'subcategoria_id' => 29,
        'tipo_producto_id' => 4]);

        $producto = Productos::create(['nombre'=> 'cPanel Premiere 225',
        'slug' => 'cpanel-premiere-225',
        'meta_title' => 'cPanel Premiere 225',
        'meta_description' => 'cPanel Premiere 225' ,
        'meta_key' => 'cpanel' ,
        'precio' => 40000,
        'subcategoria_id' => 29,
        'tipo_producto_id' => 4]);

        $producto = Productos::create(['nombre'=> 'cPanel Premiere 250',
        'slug' => 'cpanel-premiere-250',
        'meta_title' => 'cPanel Premiere 250',
        'meta_description' => 'cPanel Premiere 250' ,
        'meta_key' => 'cpanel' ,
        'precio' => 45000,
        'subcategoria_id' => 29,
        'tipo_producto_id' => 4]);

        // servidores dedicado hp

        $producto = Productos::create(['nombre'=> 'HPE ProLiant DL20 Gen10',
        'slug' => 'hpe-proliant-dl20-gen10',
        'meta_title' => 'HPE ProLiant DL20 Gen10',
        'meta_description' => 'HPE ProLiant DL20 Gen10' ,
        'meta_key' => 'hp,gen10' ,
        'precio' => 5000,
        'subcategoria_id' => 16,
        'tipo_producto_id' => 6]);

        $caracteristicas = [
            ["nombre" => 'Memoria RAM', "capacidad" => '16 GB']
        ];

        foreach ($caracteristicas as $key => $value) {

            CarateristicassProductos::create([
                'nombre' => $value["nombre"],
                'capacidad' => $value["capacidad"],
                'producto_id' => $producto->id_producto
            ]);
        }

        $producto = Productos::create(['nombre'=> 'HPE ProLiant DL360 Gen10',
        'slug' => 'hpe-proliant-dl360-gen10',
        'meta_title' => 'HPE ProLiant DL360 Gen10',
        'meta_description' => 'HPE ProLiant DL360 Gen10' ,
        'meta_key' => 'hp,gen10' ,
        'precio' => 10000,
        'subcategoria_id' => 16,
        'tipo_producto_id' => 6]);

        $caracteristicas = [
            ["nombre" => 'Memoria RAM', "capacidad" => '16 GB']
        ];

        foreach ($caracteristicas as $key => $value) {

            CarateristicassProductos::create([
                'nombre' => $value["nombre"],
                'capacidad' => $value["capacidad"],
                'producto_id' => $producto->id_producto
            ]);
        }

        //***************

        // servidores Dell

        $producto = Productos::create(['nombre'=> 'PowerEdge R440',
        'slug' => 'poweredge-r440',
        'meta_title' => 'PowerEdge R440',
        'meta_description' => 'PowerEdge R440' ,
        'meta_key' => 'dell' ,
        'precio' => 10000,
        'subcategoria_id' => 17,
        'tipo_producto_id' => 7]);

        $caracteristicas = [
            ["nombre" => 'Memoria RAM', "capacidad" => '8 GB'],
            ["nombre" => 'Core', "capacidad" => '2'],
            ["nombre" => 'Almacenamiento', "capacidad" => '2 TB']
        ];

        foreach ($caracteristicas as $key => $value) {

            CarateristicassProductos::create([
                'nombre' => $value["nombre"],
                'capacidad' => $value["capacidad"],
                'producto_id' => $producto->id_producto
            ]);
        }

        //*************************

        //Administración por evento

        $producto = Productos::create(['nombre'=> 'Administracion por Evento Servidor en Arriendo',
                                        'slug' => 'administracion-por-evento-servidor-en-arriendo',
                                        'meta_title' => 'Administracion por Evento Servidor en Arriendo',
                                        'meta_description' => 'Administracion por Evento Servidor en Arriendo' ,
                                        'meta_key' => 'administracio,servidor,arriendo' ,
                                        'precio' => 60000,
                                        'subcategoria_id' => 18,
                                        'tipo_producto_id' => 6]);

        $caracteristicas = [
            ["nombre" => '1', "capacidad" => 'Asistencia y administración del servidor'],
            ["nombre" => '2', "capacidad" => 'Asistencia y administración del hosting'],
            ["nombre" => '2', "capacidad" => 'Backup diario, semanal y mensual.'],
            ["nombre" => '2', "capacidad" => 'Monitorización del sistema y archivo de registros'],
            ["nombre" => '2', "capacidad" => 'Soporte técnico 24/7']
        ];

        foreach ($caracteristicas as $key => $value) {

            CarateristicassProductos::create([
                'nombre' => $value["nombre"],
                'capacidad' => $value["capacidad"],
                'producto_id' => $producto->id_producto
            ]);
        }

        //********************** */

        // radios

        $producto = Productos::create(['nombre'=> 'Streaming Radio 128',
        'slug' => 'streaming-radio-128',
        'meta_title' => 'Streaming Radio 128',
        'meta_description' => 'Streaming Radio 128' ,
        'meta_key' => 'streaming,radio' ,
        'precio' => 5000,
        'subcategoria_id' => 19,
        'tipo_producto_id' => 5]);

        $producto = Productos::create(['nombre'=> 'Streaming Radio 512',
        'slug' => 'streaming-radio-512',
        'meta_title' => 'Streaming Radio 512',
        'meta_description' => 'Streaming Radio 512' ,
        'meta_key' => 'streaming,radio' ,
        'precio' => 6000,
        'subcategoria_id' => 19,
        'tipo_producto_id' => 5]);

        $producto = Productos::create(['nombre'=> 'Streaming Radio 768',
        'slug' => 'streaming-radio-768',
        'meta_title' => 'Streaming Radio 768',
        'meta_description' => 'Streaming Radio 768' ,
        'meta_key' => 'streaming,radio' ,
        'precio' => 7000,
        'subcategoria_id' => 19,
        'tipo_producto_id' => 5]);

        $producto = Productos::create(['nombre'=> 'Streaming Radio 1024',
        'slug' => 'streaming-radio-1024',
        'meta_title' => 'Streaming Radio 1024',
        'meta_description' => 'Streaming Radio 1024' ,
        'meta_key' => 'streaming,radio' ,
        'precio' => 8000,
        'subcategoria_id' => 19,
        'tipo_producto_id' => 5]);

        //********************


        //Licencias Microsoft

        $producto = Productos::create(['nombre'=> 'SQLSvrStdCore ALNG LicSAPk MVL  4 Cores',
        'slug' => 'sqlsvrstdcore-alng-licsapk mvl  4 Cores',
        'meta_title' => 'SQLSvrStdCore ALNG LicSAPk MVL  4 Cores',
        'meta_description' => 'SQLSvrStdCore ALNG LicSAPk MVL  4 Cores' ,
        'meta_key' => 'sql,sqlserver' ,
        'precio' => 5000,
        'subcategoria_id' => 23,
        'tipo_producto_id' => 8]);

        $producto = Productos::create(['nombre'=> 'SQLSvrEntCore ALNG LicSAPk MVL  4 Cores',
        'slug' => 'sqlsvrentcore-alng-licsapk mvl  4 Cores',
        'meta_title' => 'SQLSvrEntCore ALNG LicSAPk MVL  4 Cores',
        'meta_description' => 'SQLSvrEntCore ALNG LicSAPk MVL  4 Cores' ,
        'meta_key' => 'sql,sqlserver' ,
        'precio' => 7000,
        'subcategoria_id' => 23,
        'tipo_producto_id' => 8]);


        $producto = Productos::create(['nombre'=> 'SQLSvrWebCore ALNG LicSAPk MVL  4 Cores',
        'slug' => 'sqlsvrwebcore-alng-licsapk mvl  4 Cores',
        'meta_title' => 'SQLSvrWebCore ALNG LicSAPk MVL  4 Cores',
        'meta_description' => 'SQLSvrWebCore ALNG LicSAPk MVL  4 Cores' ,
        'meta_key' => 'sql,sqlserver' ,
        'precio' => 8000,
        'subcategoria_id' => 23,
        'tipo_producto_id' => 8]);

        //*****************************

        //Migración Google Workspace

        $producto = Productos::create(['nombre'=> '(Migracion Workspace) 1GB a 12GB',
                                        'slug' => 'migracion-workspace-1gb-a-12gb',
                                        'meta_title' => '(Migracion Workspace) 1GB a 12GB',
                                        'meta_description' => '(Migracion Workspace) 1GB a 12GB' ,
                                        'meta_key' => 'migracion,google,workspace' ,
                                        'precio' => 35990,
                                        'subcategoria_id' => 21,
                                        'tipo_producto_id' => 9]);

        $caracteristicas = [
            ["nombre" => '1', "capacidad" => 'El tiempo de migración será de máximo 72 horas. '],
            ["nombre" => '2', "capacidad" => 'Migración de correos a través de IMAP.'],
            ["nombre" => '3', "capacidad" => 'Transferencia sin pérdida de datos.']
        ];

        foreach ($caracteristicas as $key => $value) {

            CarateristicassProductos::create([
                'nombre' => $value["nombre"],
                'capacidad' => $value["capacidad"],
                'producto_id' => $producto->id_producto
            ]);
        }

        $producto = Productos::create(['nombre'=> '(Migracion Workspace) 12GB a 25GB',
                                        'slug' => 'migracion-workspace-12gb-a-25gb',
                                        'meta_title' => '(Migracion Workspace) 12GB a 25GB',
                                        'meta_description' => '(Migracion Workspace) 12GB a 25GB' ,
                                        'meta_key' => 'migracion,google,workspace' ,
                                        'precio' => 85990,
                                        'subcategoria_id' => 21,
                                        'tipo_producto_id' => 9]);

        $caracteristicas = [
            ["nombre" => '1', "capacidad" => 'El tiempo de migración será de máximo 72 horas. '],
            ["nombre" => '2', "capacidad" => 'Migración de correos a través de IMAP.'],
            ["nombre" => '3', "capacidad" => 'Transferencia sin pérdida de datos.']
        ];

        foreach ($caracteristicas as $key => $value) {

            CarateristicassProductos::create([
                'nombre' => $value["nombre"],
                'capacidad' => $value["capacidad"],
                'producto_id' => $producto->id_producto
            ]);
        }

        //********************** */

        //Google Workspace

        $producto = Productos::create(['nombre'=> 'Google Workspace Business Starter',
                                        'slug' => 'google-workspace-business-starter',
                                        'meta_title' => 'Google Workspace Business',
                                        'meta_description' => 'Google Workspace Business' ,
                                        'meta_key' => 'licencia,google,workspace' ,
                                        'precio' => 50000,
                                        'subcategoria_id' => 20,
                                        'tipo_producto_id' => 9]);

        $caracteristicas = [
            ["nombre" => '1', "capacidad" => 'Correo electrónico de nivel empresarial, personalizado y seguro'],
            ["nombre" => '2', "capacidad" => '30 GB de espacio en la nube por usuario (Google Drive y Gmail)'],
            ["nombre" => '3', "capacidad" => 'Videollamadas de hasta 100 usuarios'],
            ["nombre" => '4', "capacidad" => 'Cifrado de datos en tránsito y reposo'],
            ["nombre" => '5', "capacidad" => 'Programa de protección avanzada']
        ];

        foreach ($caracteristicas as $key => $value) {

            CarateristicassProductos::create([
                'nombre' => $value["nombre"],
                'capacidad' => $value["capacidad"],
                'producto_id' => $producto->id_producto
            ]);
        }

        $producto = Productos::create(['nombre'=> 'Google Workspace Business Standard',
                                        'slug' => 'google-workspace-business-standard',
                                        'meta_title' => 'Google Workspace Business Standard',
                                        'meta_description' => 'Google Workspace Business Standard' ,
                                        'meta_key' => 'licencia,google,workspace' ,
                                        'precio' => 85990,
                                        'subcategoria_id' => 20,
                                        'tipo_producto_id' => 9]);

        $caracteristicas = [
            ["nombre" => '1', "capacidad" => 'Correo electrónico de nivel empresarial, personalizado y seguro'],
            ["nombre" => '2', "capacidad" => '2 TB de espacio en la nube por usuario (Google Drive y Gmail)'],
            ["nombre" => '3', "capacidad" => 'Videollamadas de hasta 100 usuarios'],
            ["nombre" => '4', "capacidad" => 'Cifrado de datos en tránsito y reposo'],
            ["nombre" => '5', "capacidad" => 'Programa de protección avanzada']
        ];

        foreach ($caracteristicas as $key => $value) {

            CarateristicassProductos::create([
                'nombre' => $value["nombre"],
                'capacidad' => $value["capacidad"],
                'producto_id' => $producto->id_producto
            ]);
        }

        //********************** */

        //Google Ads

        $producto = Productos::create(['nombre'=> 'Google Ads',
                                        'slug' => 'google-ads',
                                        'meta_title' => 'Google Ads',
                                        'meta_description' => 'Google Ads' ,
                                        'meta_key' => 'ads,google,workspace' ,
                                        'precio' => 19000,
                                        'subcategoria_id' => 22,
                                        'tipo_producto_id' => 9]);

        $caracteristicas = [
            ["nombre" => '1', "capacidad" => 'Selección de palabras clave o keywords'],
            ["nombre" => '2', "capacidad" => 'Atención personalizada con experto certificado en Google Ads'],
            ["nombre" => '3', "capacidad" => 'Creación de anuncios'],
            ["nombre" => '4', "capacidad" => 'Extensiones de anuncios'],
            ["nombre" => '5', "capacidad" => 'Informe periódico de estadísticas	']
        ];

        foreach ($caracteristicas as $key => $value) {

            CarateristicassProductos::create([
                'nombre' => $value["nombre"],
                'capacidad' => $value["capacidad"],
                'producto_id' => $producto->id_producto
            ]);
        }

        //********************** */

        //Licencias Microsoft 365

        $producto = Productos::create(['nombre'=> 'Microsoft 365 Empresa Básico',
                                        'slug' => 'microsoft-365-empresa-basico',
                                        'meta_title' => 'Microsoft 365 Empresa Básico',
                                        'meta_description' => 'Microsoft 365 Empresa Básico' ,
                                        'meta_key' => 'licencia,google,workspace' ,
                                        'precio' => 12600,
                                        'subcategoria_id' => 24,
                                        'tipo_producto_id' => 8]);

        $caracteristicas = [
            ["nombre" => '1', "capacidad" => 'Correo electrónico de nivel empresarial, personalizado y seguro'],
            ["nombre" => '2', "capacidad" => '2 TB de espacio en la nube por usuario (Google Drive y Gmail)'],
            ["nombre" => '3', "capacidad" => 'Videollamadas de hasta 100 usuarios'],
            ["nombre" => '4', "capacidad" => 'Cifrado de datos en tránsito y reposo'],
            ["nombre" => '5', "capacidad" => 'Programa de protección avanzada']
        ];

        foreach ($caracteristicas as $key => $value) {

            CarateristicassProductos::create([
                'nombre' => $value["nombre"],
                'capacidad' => $value["capacidad"],
                'producto_id' => $producto->id_producto
            ]);
        }

        $producto = Productos::create(['nombre'=> 'Microsoft 365 Empresa Estandar',
                                        'slug' => 'microsoft-365-empresa-estandar',
                                        'meta_title' => 'Microsoft 365 Empresa Estandar',
                                        'meta_description' => 'Microsoft 365 Empresa Estandar' ,
                                        'meta_key' => 'licencia,google,workspace' ,
                                        'precio' => 15600,
                                        'subcategoria_id' => 24,
                                        'tipo_producto_id' => 8]);

        $caracteristicas = [
            ["nombre" => '1', "capacidad" => 'Correo electrónico de nivel empresarial, personalizado y seguro'],
            ["nombre" => '2', "capacidad" => '2 TB de espacio en la nube por usuario (Google Drive y Gmail)'],
            ["nombre" => '3', "capacidad" => 'Videollamadas de hasta 100 usuarios'],
            ["nombre" => '4', "capacidad" => 'Cifrado de datos en tránsito y reposo'],
            ["nombre" => '5', "capacidad" => 'Programa de protección avanzada']
        ];

        foreach ($caracteristicas as $key => $value) {

            CarateristicassProductos::create([
                'nombre' => $value["nombre"],
                'capacidad' => $value["capacidad"],
                'producto_id' => $producto->id_producto
            ]);
        }


        //************************

        //Soporte Microsoft 365

        $producto = Productos::create(['nombre'=> 'Configuracion Inicial Microsoft 365',
                                        'slug' => 'configuracion-inicial-microsoft-365',
                                        'meta_title' => 'Configuracion Inicial Microsoft 365',
                                        'meta_description' => 'Configuracion Inicial Microsoft 365' ,
                                        'meta_key' => 'configuracion,microsoft,365' ,
                                        'precio' => 45000,
                                        'subcategoria_id' => 26,
                                        'tipo_producto_id' => 8]);



        //********************** */

        //Almacenamiento adicional Google Workspace

        $producto = Productos::create(['nombre'=> 'Google Drive 20GB',
                                        'slug' => 'google-drive-20gb',
                                        'meta_title' => 'Google Drive 20GB',
                                        'meta_description' => 'Google Drive 20GB' ,
                                        'meta_key' => 'google,workspace,drive' ,
                                        'precio' => 8500,
                                        'subcategoria_id' => 27,
                                        'tipo_producto_id' => 9]);

        $producto = Productos::create(['nombre'=> 'Google Drive 50GB',
        'slug' => 'google-drive-50gb',
        'meta_title' => 'Google Drive 50GB',
        'meta_description' => 'Google Drive 50GB' ,
        'meta_key' => 'google,workspace,drive' ,
        'precio' => 9500,
        'subcategoria_id' => 27,
        'tipo_producto_id' => 9]);

        //********************** */

        //Housing

        $producto = Productos::create(['nombre'=> 'Housing DATACENTER TIER II',
                                        'slug' => 'housing-datacenter-tier-ii',
                                        'meta_title' => 'Housing DATACENTER TIER II',
                                        'meta_description' => 'Housing DATACENTER TIER II' ,
                                        'meta_key' => 'housing,datacenter,tier,ii' ,
                                        'precio' => 165000,
                                        'subcategoria_id' => 28,
                                        'tipo_producto_id' => 10]);

        $caracteristicas = [
            ["nombre" => 'TIPO', "capacidad" => 'PROFESIONAL'],
            ["nombre" => 'ADMINISTRACIÓN', "capacidad" => 'REMOTA PARA CLIENTES'],
            ["nombre" => 'FORMATO SERVIDOR', "capacidad" => 'TOWER - 1U Y 2U'],
            ["nombre" => 'SISTEMAS UPS', "capacidad" => 'UNA UPS POR RACK'],
            ["nombre" => 'ENLACE NACIONAL', "capacidad" => '1 Gbps'],
            ["nombre" => 'ENLACE INTERNACIONAL', "capacidad" => '100 MB']
        ];

        foreach ($caracteristicas as $key => $value) {

            CarateristicassProductos::create([
                'nombre' => $value["nombre"],
                'capacidad' => $value["capacidad"],
                'producto_id' => $producto->id_producto
            ]);
        }

        $producto = Productos::create(['nombre'=> 'Housing DATACENTER TIER III',
                                        'slug' => 'housing-datacenter-tier-iii',
                                        'meta_title' => 'Housing DATACENTER TIER III',
                                        'meta_description' => 'Housing DATACENTER TIER III' ,
                                        'meta_key' => 'housing,datacenter,tier,iii' ,
                                        'precio' => 360000,
                                        'subcategoria_id' => 28,
                                        'tipo_producto_id' => 10]);

        $caracteristicas = [
            ["nombre" => 'FORMATO SERVIDOR', "capacidad" => '1U Y 2U'],
            ["nombre" => 'SISTEMAS UPS', "capacidad" => 'REDUNDANCIA N + 1'],
            ["nombre" => 'ADMINISTRACIÓN', "capacidad" => 'REMOTA PARA CLIENTES'],
            ["nombre" => 'TIPO', "capacidad" => 'WORLD CLASS'],
            ["nombre" => 'ENLACE NACIONAL', "capacidad" => '1 Gbps'],
            ["nombre" => 'ENLACE INTERNACIONAL', "capacidad" => '100 MB']
        ];

        foreach ($caracteristicas as $key => $value) {

            CarateristicassProductos::create([
                'nombre' => $value["nombre"],
                'capacidad' => $value["capacidad"],
                'producto_id' => $producto->id_producto
            ]);
        }

        //********************** */

        //Licencias Imunify360

        $producto = Productos::create(['nombre'=> 'Licencia Imunify360 Ilimitada',
                                        'slug' => 'licencia-imunify360-ilimitada',
                                        'meta_title' => 'Licencia Imunify360 Ilimitada',
                                        'meta_description' => 'Licencia Imunify360 Ilimitada' ,
                                        'meta_key' => 'licencia,imunify360' ,
                                        'precio' => 38000,
                                        'subcategoria_id' => 30,
                                        'tipo_producto_id' => 11]);

        $caracteristicas = [
            ["nombre" => '1', "capacidad" => 'Usuarios ilimitados'],
            ["nombre" => '2', "capacidad" => 'Firewall avanzado'],
            ["nombre" => '3', "capacidad" => 'Detección de intrusos'],
            ["nombre" => '4', "capacidad" => 'Detección de malware'],
            ["nombre" => '5', "capacidad" => 'Defensa proactiva']
        ];

        foreach ($caracteristicas as $key => $value) {

            CarateristicassProductos::create([
                'nombre' => $value["nombre"],
                'capacidad' => $value["capacidad"],
                'producto_id' => $producto->id_producto
            ]);
        }

        $producto = Productos::create(['nombre'=> 'Licencia Imunify AV+',
                                        'slug' => 'licencia-imunify360-avplus',
                                        'meta_title' => 'Licencia Imunify AV+',
                                        'meta_description' => 'Licencia Imunify AV+' ,
                                        'meta_key' => 'licencia,imunify360' ,
                                        'precio' => 24000,
                                        'subcategoria_id' => 30,
                                        'tipo_producto_id' => 11]);

        $caracteristicas = [
            ["nombre" => '1', "capacidad" => 'Limpieza de malware con un clic'],
            ["nombre" => '2', "capacidad" => 'Eliminación intuitiva de malware'],
            ["nombre" => '3', "capacidad" => 'Protección a nivel de sistema de archivos'],
            ["nombre" => '4', "capacidad" => 'Detección de malware']
        ];

        foreach ($caracteristicas as $key => $value) {

            CarateristicassProductos::create([
                'nombre' => $value["nombre"],
                'capacidad' => $value["capacidad"],
                'producto_id' => $producto->id_producto
            ]);
        }

        //********************** */

         //Backup recovery

         $producto = Productos::create(['nombre'=> 'Backup Recovery 50GB',
         'slug' => 'backup-recovery-50gb',
         'meta_title' => 'Backup Recovery 50GB',
         'meta_description' => 'Backup Recovery 50GB' ,
         'meta_key' => 'backup,recovery' ,
         'precio' => 29900,
         'subcategoria_id' => 32,
         'tipo_producto_id' => 2]);

        //********************** */



    }
}
