<?php 

namespace App\Enums;

enum EstadoPropiedad: string 
{
    case DISPONIBLE = 'disponible';
    case VENDIDA = 'vendida';
    case ALQUILADA = 'alquilada';
}