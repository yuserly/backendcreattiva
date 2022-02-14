<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

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



    }
}
