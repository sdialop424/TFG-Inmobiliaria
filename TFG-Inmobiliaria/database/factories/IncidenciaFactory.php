<?php

namespace Database\Factories;

use App\Models\Propiedad;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Incidencia;
use App\Models\EstadoIncidencia;
use App\Models\TipoIncidencia;

class IncidenciaFactory extends Factory
{
    protected $model = Incidencia::class;

    public function definition(): array
    {
        return [
            'propiedad_id' => Propiedad::inRandomOrder()->first()->id,
            'descripcion' => fake()->sentence(),
            'estado_incidencia_id' => EstadoIncidencia::inRandomOrder()->first()->id,
            'tipo_incidencia_id' => TipoIncidencia::inRandomOrder()->first()->id,
        ];
    }
}