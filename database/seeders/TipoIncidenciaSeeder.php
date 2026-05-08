<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TipoIncidencia;

class TipoIncidenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void

    {
        TipoIncidencia::firstOrCreate(['nombre' => 'Mantenimiento']);
        TipoIncidencia::firstOrCreate(['nombre' => 'Reparación']);
        TipoIncidencia::firstOrCreate(['nombre' => 'Limpieza']);
    }
}
