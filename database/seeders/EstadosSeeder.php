<?php

namespace Database\Seeders;

use App\Models\Estados;
use Illuminate\Database\Seeder;

class EstadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Estados::create(['estado'=> 'no pagado']);
        Estados::create(['estado'=> 'pagado']);
        Estados::create(['estado'=> 'pago rechazado']);
        Estados::create(['estado'=> 'activo']);
        Estados::create(['estado'=> 'suspendido']);



    }
}
