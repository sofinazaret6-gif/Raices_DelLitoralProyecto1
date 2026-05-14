<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
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

    protected $casts = [
        'password' => 'hashed',
    ];
    public function perfil()
{
    return $this->belongsTo(Perfil::class, 'id_perfil');
}

}
