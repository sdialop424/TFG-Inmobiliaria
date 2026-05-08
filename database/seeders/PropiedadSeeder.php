<?php 

namespace Database\Seeders;

use App\Models\Propiedad;
use Illuminate\Database\Console\Seeds\WithoutModelEvent;
use illuminate\database\Seeder;

class PropiedadSeeder extends Seeder
{
    public function run(): void
    {
        
        Propiedad::factory()->count(10)->create();
    }
}
