<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Persona extends Authenticatable
{
    protected $fillable = [
        'nombre',
        'apellido',
        'telefono',
        'email',
        'password',
        'id_perfil',
        'estado',
    ];

    protected $hidden = [
        'password',
    ];
    
    protected $casts = [
        'password' => 'hashed',
    ];

    // Relación con la tabla de perfiles
    public function perfil()
    {
        return $this->belongsTo(Perfil::class, 'id_perfil');
    }
}
