<?php

namespace Database\Seeders;

use App\Models\Incidencia;
use Illuminate\Database\Console\Seeds\WithoutModelEvent;
use Illuminate\Database\Seeder;

class IncidenciaSeeder extends Seeder
{
    public function run() : void
    { 
       Incidencia::factory() -> count(15)-> create();
    }
}