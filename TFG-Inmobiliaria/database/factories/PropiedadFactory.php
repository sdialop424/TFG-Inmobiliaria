<?php

namespace Database\Factories;

use App\Models\Propiedad;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\TipoPropiedad;

class PropiedadFactory extends Factory
{
    protected $model = Propiedad::class;

    public function definition(): array
    {
        return [
            'usuario_id' =>User::inRandomOrder()->first()->id,
            'tipo_propiedad_id' => TipoPropiedad::inRandomOrder()->first()->id,
            'direccion' => fake()->address(),
        ];
    }
}