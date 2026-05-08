<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\EstadoIncidencia;

class EstadoIncidenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void

    {
        EstadoIncidencia::firstOrCreate(['nombre' => 'Pendiente']);
        EstadoIncidencia::firstOrCreate(['nombre' => 'En Progreso']);
        EstadoIncidencia::firstOrCreate(['nombre' => 'Resuelta']);
    }
}
