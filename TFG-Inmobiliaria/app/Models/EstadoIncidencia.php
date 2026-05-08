<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model; 


class EstadoIncidencia extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre'
    ];
    
    

    protected $table = 'estados_incidencia';

    public function incidencias()
    {
        return $this->hasMany(Incidencia::class);
    }
}