<?php

namespace Database\Seeders;

use App\Models\PrecioDominios;
use Illuminate\Database\Seeder;

class PrecioDominiosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PrecioDominios::create(['extension'=> 'cl' ,'precio' => 10000]);
        PrecioDominios::create(['extension'=> 'com' ,'precio' => 12900]);
        PrecioDominios::create(['extension'=> 'org' ,'precio' => 8900]);
        PrecioDominios::create(['extension'=> 'store' ,'precio' => 5000]);
        PrecioDominios::create(['extension'=> 'digital' ,'precio' => 7000]);
        PrecioDominios::create(['extension'=> 'net' ,'precio' => 4000]);
    }
}
