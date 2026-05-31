<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
   protected $fillable = [
    'detalle_cant',
    'detalle_precio'
    'id_producto';
   ];

   public function producto()
   {
     return $this->belongsTo(Categoria::class, 'id_cateogoria');
   }
}
