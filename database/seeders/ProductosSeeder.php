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

        // producto 2

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

        // producto 3

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

         // producto 4

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

        // producto 5

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

       // producto 7

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

      // producto 8

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

     // producto 9

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

    // producto 10

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

    //    servidores

    $producto = Productos::create(['nombre'=> 'Servidor VPS Linux 1 GB',
    'slug' => 'servidor-vps-linuxIlimitadogb',
    'meta_title' => 'Servidor VPS Linux 1 GB',
    'meta_description' => 'Servidor VPS Linux 1 GB' ,
    'meta_key' => 'servidor, vps, linux' ,
    'precio' => 50000,
    'subcategoria_id' => 6,
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
                                        'subcategoria_id' => 6,
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

        $producto = Productos::create(['nombre'=> 'Servidor VPS Windows 2 GB',
                                        'slug' => 'servidor-vps-windows-2gb',
                                        'meta_title' => 'Servidor VPS Windows 2 GB',
                                        'meta_description' => 'Servidor VPS Windows 2 GB' ,
                                        'meta_key' => 'servidor, vps, Windows' ,
                                        'precio' => 50000,
                                        'subcategoria_id' => 7,
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
                                        'subcategoria_id' => 7,
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


        $producto = Productos::create(['nombre'=> 'Servidor VPS Linux 2 GB',
                                        'slug' => 'servidor-vps-linux-2gb',
                                        'meta_title' => 'Servidor VPS Linux 2 GB',
                                        'meta_description' => 'Servidor VPS Linux 2 GB' ,
                                        'meta_key' => 'servidor, vps, Linux' ,
                                        'precio' => 50000,
                                        'subcategoria_id' => 8,
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
                                        'subcategoria_id' => 8,
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

        // dominios
        $producto = Productos::create(['nombre'=> 'Registro de dominios',
        'slug' => 'registro-dominios',
        'meta_title' => 'Registro de dominios',
        'meta_description' => 'Registro de dominios' ,
        'meta_key' => '.com, .net, .org' ,
        'precio' => 0,
        'subcategoria_id' => 26,
        'tipo_producto_id' => 3]);

        // licencias cpanel

        $producto = Productos::create(['nombre'=> 'cPanel Admin 5',
        'slug' => 'cpanel-admin-5',
        'meta_title' => 'cPanel Admin 5',
        'meta_description' => 'cPanel Admin 5' ,
        'meta_key' => 'cpanel' ,
        'precio' => 7000,
        'subcategoria_id' => 24,
        'tipo_producto_id' => 4]);

        $producto = Productos::create(['nombre'=> 'cPanel Pro 30',
        'slug' => 'cpanel-pro-30',
        'meta_title' => 'cPanel Pro 30',
        'meta_description' => 'cPanel Pro 30' ,
        'meta_key' => 'cpanel' ,
        'precio' => 10000,
        'subcategoria_id' => 24,
        'tipo_producto_id' => 4]);

        $producto = Productos::create(['nombre'=> 'cPanel Premiere 100',
        'slug' => 'cpanel-premiere-100',
        'meta_title' => 'cPanel Premiere 100',
        'meta_description' => 'cPanel Premiere 100' ,
        'meta_key' => 'cpanel' ,
        'precio' => 15000,
        'subcategoria_id' => 24,
        'tipo_producto_id' => 4]);

        $producto = Productos::create(['nombre'=> 'cPanel Premiere 125',
        'slug' => 'cpanel-premiere-125',
        'meta_title' => 'cPanel Premiere 125',
        'meta_description' => 'cPanel Premiere 125' ,
        'meta_key' => 'cpanel' ,
        'precio' => 20000,
        'subcategoria_id' => 24,
        'tipo_producto_id' => 4]);

        $producto = Productos::create(['nombre'=> 'cPanel Premiere 150',
        'slug' => 'cpanel-premiere-150',
        'meta_title' => 'cPanel Premiere 150',
        'meta_description' => 'cPanel Premiere 150' ,
        'meta_key' => 'cpanel' ,
        'precio' => 25000,
        'subcategoria_id' => 24,
        'tipo_producto_id' => 4]);

        $producto = Productos::create(['nombre'=> 'cPanel Premiere 175',
        'slug' => 'cpanel-premiere-175',
        'meta_title' => 'cPanel Premiere 175',
        'meta_description' => 'cPanel Premiere 175' ,
        'meta_key' => 'cpanel' ,
        'precio' => 30000,
        'subcategoria_id' => 24,
        'tipo_producto_id' => 4]);

        $producto = Productos::create(['nombre'=> 'cPanel Premiere 200',
        'slug' => 'cpanel-premiere-200',
        'meta_title' => 'cPanel Premiere 200',
        'meta_description' => 'cPanel Premiere 200' ,
        'meta_key' => 'cpanel' ,
        'precio' => 35000,
        'subcategoria_id' => 24,
        'tipo_producto_id' => 4]);

        $producto = Productos::create(['nombre'=> 'cPanel Premiere 225',
        'slug' => 'cpanel-premiere-225',
        'meta_title' => 'cPanel Premiere 225',
        'meta_description' => 'cPanel Premiere 225' ,
        'meta_key' => 'cpanel' ,
        'precio' => 40000,
        'subcategoria_id' => 24,
        'tipo_producto_id' => 4]);

        $producto = Productos::create(['nombre'=> 'cPanel Premiere 250',
        'slug' => 'cpanel-premiere-250',
        'meta_title' => 'cPanel Premiere 250',
        'meta_description' => 'cPanel Premiere 250' ,
        'meta_key' => 'cpanel' ,
        'precio' => 45000,
        'subcategoria_id' => 24,
        'tipo_producto_id' => 4]);

        // servidores dedicado hp

        $producto = Productos::create(['nombre'=> 'HPE ProLiant DL20 Gen10',
        'slug' => 'hpe-proliant-dl20-gen10',
        'meta_title' => 'HPE ProLiant DL20 Gen10',
        'meta_description' => 'HPE ProLiant DL20 Gen10' ,
        'meta_key' => 'hp,gen10' ,
        'precio' => 5000,
        'subcategoria_id' => 12,
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
        'subcategoria_id' => 12,
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

        // servidores Dell

        $producto = Productos::create(['nombre'=> 'PowerEdge R440',
        'slug' => 'poweredge-r440',
        'meta_title' => 'PowerEdge R440',
        'meta_description' => 'PowerEdge R440' ,
        'meta_key' => 'dell' ,
        'precio' => 10000,
        'subcategoria_id' => 13,
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

        // radios

        $producto = Productos::create(['nombre'=> 'Streaming Radio 128',
        'slug' => 'streaming-radio-128',
        'meta_title' => 'Streaming Radio 128',
        'meta_description' => 'Streaming Radio 128' ,
        'meta_key' => 'streaming,radio' ,
        'precio' => 5000,
        'subcategoria_id' => 15,
        'tipo_producto_id' => 5]);

        $producto = Productos::create(['nombre'=> 'Streaming Radio 512',
        'slug' => 'streaming-radio-512',
        'meta_title' => 'Streaming Radio 512',
        'meta_description' => 'Streaming Radio 512' ,
        'meta_key' => 'streaming,radio' ,
        'precio' => 6000,
        'subcategoria_id' => 15,
        'tipo_producto_id' => 5]);

        $producto = Productos::create(['nombre'=> 'Streaming Radio 768',
        'slug' => 'streaming-radio-768',
        'meta_title' => 'Streaming Radio 768',
        'meta_description' => 'Streaming Radio 768' ,
        'meta_key' => 'streaming,radio' ,
        'precio' => 7000,
        'subcategoria_id' => 15,
        'tipo_producto_id' => 5]);

        $producto = Productos::create(['nombre'=> 'Streaming Radio 1024',
        'slug' => 'streaming-radio-1024',
        'meta_title' => 'Streaming Radio 1024',
        'meta_description' => 'Streaming Radio 1024' ,
        'meta_key' => 'streaming,radio' ,
        'precio' => 8000,
        'subcategoria_id' => 15,
        'tipo_producto_id' => 5]);

        $producto = Productos::create(['nombre'=> 'SQLSvrStdCore ALNG LicSAPk MVL  4 Cores',
        'slug' => 'sqlsvrstdcore-alng-licsapk mvl  4 Cores',
        'meta_title' => 'SQLSvrStdCore ALNG LicSAPk MVL  4 Cores',
        'meta_description' => 'SQLSvrStdCore ALNG LicSAPk MVL  4 Cores' ,
        'meta_key' => 'sql,sqlserver' ,
        'precio' => 5000,
        'subcategoria_id' => 19,
        'tipo_producto_id' => 8]);

        $producto = Productos::create(['nombre'=> 'SQLSvrEntCore ALNG LicSAPk MVL  4 Cores',
        'slug' => 'sqlsvrentcore-alng-licsapk mvl  4 Cores',
        'meta_title' => 'SQLSvrEntCore ALNG LicSAPk MVL  4 Cores',
        'meta_description' => 'SQLSvrEntCore ALNG LicSAPk MVL  4 Cores' ,
        'meta_key' => 'sql,sqlserver' ,
        'precio' => 7000,
        'subcategoria_id' => 19,
        'tipo_producto_id' => 8]);


        $producto = Productos::create(['nombre'=> 'SQLSvrWebCore ALNG LicSAPk MVL  4 Cores',
        'slug' => 'sqlsvrwebcore-alng-licsapk mvl  4 Cores',
        'meta_title' => 'SQLSvrWebCore ALNG LicSAPk MVL  4 Cores',
        'meta_description' => 'SQLSvrWebCore ALNG LicSAPk MVL  4 Cores' ,
        'meta_key' => 'sql,sqlserver' ,
        'precio' => 8000,
        'subcategoria_id' => 19,
        'tipo_producto_id' => 8]);



    }
}
