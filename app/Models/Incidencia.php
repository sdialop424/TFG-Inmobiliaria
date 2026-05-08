<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incidencia extends Model
{
    use HasFactory;
    protected $table = 'incidencias';
    

    protected $fillable = [
        'descripcion',
        'tipo_incidencia_id',
        'propiedad_id',
        'estado_incidencia_id',
    ];

    // Relación: una incidencia pertenece a una propiedad
    public function propiedad()
    {
        return $this->belongsTo(Propiedad::class);
    }

    // Relación: una incidencia pertenece a un tipo de incidencia
    public function tipoIncidencia()
    {
        return $this->belongsTo(TipoIncidencia::class);
    }

    // Relación: una incidencia pertenece a un estado de incidencia
    public function estadoIncidencia()
    {
        return $this->belongsTo(EstadoIncidencia::class);
    }
    
}