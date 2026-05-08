<?php

namespace App\Services;

use App\Models\Incidencia;

class IncidenciaService
{
    public function storeIncidencia(array $datos) : Incidencia
    {
        return Incidencia::create($datos);
    }
    
    public function updateIncidencia(Incidencia $incidencia, array $datos) : Incidencia
    {
        $incidencia->update($datos);
        return $incidencia;
    }

    public function deleteIncidencia(Incidencia $incidencia) : void
    {
        $incidencia->delete();
    }
}