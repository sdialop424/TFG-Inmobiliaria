<?php 

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Propiedad extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'propiedades';

    protected $fillable = [
        'direccion',
        'usuario_id',
        'tipo_propiedad_id',
  

    ];

    // Relación: una propiedad tiene muchas incidencias
    public function incidencias()
    {
        return $this->hasMany(Incidencia::class);
    }

// Relación: una propiedad pertenece a un usuario public function usuario() { return $this->belongsTo(User::class); }
    public function usuario() { 
        return $this->belongsTo(User::class); 
    }

    public function tipoPropiedad() {
        return $this->belongsTo(TipoPropiedad::class);
    }
}
