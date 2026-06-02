<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = [
        'descripcion'
    ];

    /**
     * Relación: Una categoría tiene muchos productos.
     */
    public function productos()
    {
        // Conectamos con el modelo Producto usando la clave foránea 'id_categoria'
        return $this->hasMany(Producto::class, 'id_categoria');
    }
}