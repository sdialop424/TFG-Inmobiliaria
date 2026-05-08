<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'nombre',
        'email',
        'password',
        'rol_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    
    public function rol()
    {
        return $this->belongsTo(Rol::class);
    }

    public function isAdmin() : bool {
        $rolAdmin = Rol::where('slug', 'admin')->first();
        return $this->rol && $this->rol->slug === $rolAdmin->slug;
    }
}
