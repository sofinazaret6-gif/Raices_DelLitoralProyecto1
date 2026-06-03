<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $fillable = [
        'id_cliente',
        'fecha',
        'estadoVenta',
         'total',
         'metodo_pago'
    ];

    public function cliente()
    {
        return $this->belongsTo(Persona::class, 'id_cliente');
    }

    public function detalles()
    {
        return $this->hasMany(DetalleVenta::class, 'id_venta');
    }
}