<?php

namespace Database\Seeders;

use App\Models\Administradores;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategoriasSeeder::class);
        $this->call(SubcategoriasSeeder::class);
        $this->call(TipoProductoSeeder::class);
        $this->call(ProductosSeeder::class);
        $this->call(SistemaOperativoSeeder::class);
        $this->call(VersionSistemaSeeder::class);
        $this->call(PrecioDominiosSeeder::class);
        $this->call(PeriodosSeeder::class);
        $this->call(EstadosSeeder::class);
        $this->call(ComunaTableSeeder::class);
        $this->call(DolarSeeder::class);
        $this->call(TipoDescuentosSeeder::class);
        $this->call(CuponesSeeder::class);
        $this->call(SubcategoriasHasPeriodosSeeder::class);
        $this->call(PreguntasFrecuentesSeeder::class);
        $this->call(BannersSeeder::class);

        Administradores::create([
            'name' => 'Yuserly Bracho',
            'email' => 'yuserlybracho@gmail.com',
            'password' => Hash::make('12345678')
        ]);

    }
}
