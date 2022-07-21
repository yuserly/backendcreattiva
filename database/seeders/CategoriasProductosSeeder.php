<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Administradores;
use Illuminate\Support\Facades\Hash;

class CategoriasProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Administradores::create([
            'name' => 'Yuserly Bracho',
            'email' => 'yuserlybracho@gmail.com',
            'password' => Hash::make('12345678')
        ]);
    }
}
