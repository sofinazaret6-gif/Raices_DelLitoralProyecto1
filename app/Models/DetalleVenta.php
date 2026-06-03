<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    protected $fillable = [
        'detalle_cant',
        'detalle_precio',
        'id_producto',
        'id_venta'
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto');
    }

    public function venta()
    {
        return $this->belongsTo(Venta::class, 'id_venta');
    }
}