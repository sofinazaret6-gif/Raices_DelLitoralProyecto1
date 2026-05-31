<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
  protected $fillable = [
       'id_cliente'
       'fecha'  // Guardamos el ID de la categoría
    ];

    /**
     * Relación: Un producto pertenece a una categoría.
     */
    public function cliente()
    {
        return $this->belongsTo(Persona::class, 'id_categoria');
    }
}
