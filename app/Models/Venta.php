<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;
    protected $table = 'ventas';
    protected $primaryKey = 'ID_venta';
    protected $fillable = [
        'ID_cliente', 
        'monto_total', 
        'fecha_compra', 
        'estado'
    ];

    public function detalleVentas()
{
    return $this->hasMany(DetalleVenta::class, 'ID_venta', 'ID_venta');
}

public function cliente()
{
    return $this->belongsTo(Cliente::class, 'ID_cliente', 'ID_cliente');
}

    
}
