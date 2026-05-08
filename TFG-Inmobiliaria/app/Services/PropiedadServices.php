<?php

namespace App\Services;

use App\Models\Incidencia;
use App\Models\Propiedad;

class PropiedadService
{
    public function storePropiedad(array $datos) : Propiedad
    {
        return Propiedad::create($datos);
    }
    
    public function updatePropiedad(Propiedad $propiedad, array $datos) : Propiedad
    {
        $propiedad->update($datos);
        return $propiedad;
    }

    public function deletePropiedad(Propiedad $propiedad) : void
    {
        $propiedad->delete();
    }
}