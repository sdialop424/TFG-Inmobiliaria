<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TipoPropiedad;

class TipoPropiedadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void

    {
        TipoPropiedad::firstOrCreate(['nombre' => 'Casa']);
        TipoPropiedad::firstOrCreate(['nombre' => 'Local']);
        TipoPropiedad::firstOrCreate(['nombre' => 'Apartamento']);
    }
}