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
            


            RolSeeder::class,
            UserSeeder::class,
            TipoPropiedadSeeder::class,
            EstadoIncidenciaSeeder::class,
            TipoIncidenciaSeeder::class,
            
           
        ]);
        if (app()->environment('local')) {
            // Sólo se ejecutan estos seeders en el entorno local (desarrollo)
            $this->call([
                    PropiedadSeeder::class,
                    IncidenciaSeeder::class,
            ]);
        }
    }
}
