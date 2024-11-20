<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;

    protected $table = 'colores';
    protected $primaryKey = 'ID_color';

    protected $fillable = [
        'ID_producto',
        'nombre',
        'imagen',
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'ID_producto', 'ID_producto');
    }
}