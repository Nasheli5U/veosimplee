<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $table = 'productos';
    protected $primaryKey = 'ID_producto';
    protected $fillable = [
        'nombre',
        'ID_categoria',
        'ID_subcategoria',
        'ID_marca',
        'ID_material',
        'descripcion',
        'codigo_producto',
        'stock',
        'precio',
    ];

    public function colores()
    {
        return $this->hasMany(Color::class, 'ID_producto', 'ID_producto');
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'ID_categoria', 'ID_categoria');
    }

    // Relación con Subcategoría
    public function subcategoria()
    {
        return $this->belongsTo(Subcategoria::class, 'ID_subcategoria', 'ID_subcategoria');
    }

    // Relación con Marca
    public function marca()
    {
        return $this->belongsTo(Marca::class, 'ID_marca', 'ID_marca');
    }

    // Relación con Material
    public function material()
    {
        return $this->belongsTo(Material::class, 'ID_material', 'ID_material');
    }
}
