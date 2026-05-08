<?php

namespace App\Enums;

enum TipoIncidenciaEnum: string

{
    case MANTENIMIENTO = 'Mantenimiento';
    case REPARACION = 'Reparación';
    case LIMPIEZA = 'Limpieza';
}