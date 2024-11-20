<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'clientes';
    protected $primaryKey = 'ID_cliente';

    protected $fillable = [
        'dni',
        'nombre',
        'fecha_nacimiento',
        'correo',
        'telefono',
        'direccion',
        'preferencias_contacto',
        'observaciones',
    ];

    public function prescripciones()
    {
        return $this->hasMany(Prescripcion::class, 'ID_cliente', 'ID_cliente');
    }
}

