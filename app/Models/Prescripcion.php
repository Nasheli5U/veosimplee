<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescripcion extends Model
{
    use HasFactory;

    protected $table = 'prescripciones';
    protected $primaryKey = 'ID_prescripcion';

    protected $fillable = [
        'ID_cliente', 
        'esfera_oi', 
        'esfera_od', 
        'cilindro_oi', 
        'cilindro_od', 
        'eje_oi', 
        'eje_od', 
        'adicionales', 
        'fecha_prescripcion',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'ID_cliente', 'ID_cliente');
    }
}
