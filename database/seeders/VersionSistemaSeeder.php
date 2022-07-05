<?php

namespace Database\Seeders;

use App\Models\VersionSistema;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Empresas;
use Illuminate\Support\Facades\Hash;

class VersionSistemaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        VersionSistema::create(['version'=> 'CentOs 6' ,'os_id' => 1]);
        VersionSistema::create(['version'=> 'CentOs 7' ,'os_id' => 1]);
        VersionSistema::create(['version'=> 'CentOs 6 + Cpanel' ,'os_id' => 1]);
        VersionSistema::create(['version'=> 'CentOs 7 + Cpanel' ,'os_id' => 1]);

        VersionSistema::create(['version'=> 'Debian 6' ,'os_id' => 2]);
        VersionSistema::create(['version'=> 'Debian 7' ,'os_id' => 2]);

        VersionSistema::create(['version'=> 'Ubuntu 12' ,'os_id' => 3]);
        VersionSistema::create(['version'=> 'Ubuntu 10' ,'os_id' => 3]);

        VersionSistema::create(['version'=> 'Windows 12' ,'os_id' => 4]);
        VersionSistema::create(['version'=> 'Windows 10' ,'os_id' => 4]);
        VersionSistema::create(['version'=> 'Windows 12' ,'os_id' => 5]);
        VersionSistema::create(['version'=> 'Windows 10' ,'os_id' => 5]);

        User::create([
            'email' => 'jesus@creattiva.cl',
            'password' => Hash::make('12345678')
        ]);

        Empresas::create([
            'nombre' => 'Jesus Parra',
            'tipo' => 1,
            'rut' => '27022329-K',
            'email' => 'jesus@creattiva.cl',
            'telefono' => '948829322',
            'email_empresa' => 'jesus@creattiva.cl',
            'telefono_empresa' => '948829322',
            'razonsocial' => 'Jesus Parra',
            'giro' => 'Jesus Parra',
            'direccion' => 'Macul 2931',
            'pais' => 'Chile',
            'region' => 'Santiago',
            'comuna' => 'Macul',
            'user_id' => 1
        ]);

    }
}
