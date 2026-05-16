<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
#para el video de presentación, no se han incluido las incidencias en el seeder, pero se pueden añadir fácilmente ejecutando el comando "php artisan make:seeder IncidenciaSeeder" y luego añadiendo el código necesario para crear incidencias de ejemplo.

            RolSeeder::class,
            UserSeeder::class,
            TipoPropiedadSeeder::class,
           # PropiedadSeeder::class, 
            EstadoIncidenciaSeeder::class,
            TipoIncidenciaSeeder::class,
           # IncidenciaSeeder::class,
        ]);
    }
}
