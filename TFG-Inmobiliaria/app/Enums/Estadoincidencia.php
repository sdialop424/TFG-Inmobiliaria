<?php

namespace App\Enums;

enum EstadoIncidenciaEnum: string

{
    case PENDIENTE = 'Pendiente';
    case EN_PROGRESO = 'En Progreso';
    case RESUELTA = 'Resuelta';

}