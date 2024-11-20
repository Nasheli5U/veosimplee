<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    use HasFactory;
    protected $table = 'detalle_ventas';
    protected $primaryKey = 'ID_detalle';
    protected $fillable = [
        'ID_venta', 
        'ID_producto', 
        'adicionales', 
        'costo_adicional', 
        'subtotal'
    ];
    public function producto()
{
    return $this->belongsTo(Producto::class, 'ID_producto', 'ID_producto');
}

}
