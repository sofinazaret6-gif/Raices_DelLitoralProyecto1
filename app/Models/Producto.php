<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = [
        'nombre',
        'precio',
        'stock',
        'imagen',
        'descripcion',
        'id_categoria', // Guardamos el ID de la categoría
        'estado',
    ];

    /**
     * Relación: Un producto pertenece a una categoría.
     */
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }
}