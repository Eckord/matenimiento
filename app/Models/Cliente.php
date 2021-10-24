<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'cliente';

    protected $casts = [
        'codigo_postal' => 'int',
        'estado' => 'int'
    ];

    protected $fillable = [
        'nombre_cliente',
        'apellido_paterno',
        'apellido_materno',
        'calle',
        'colonia',
        'codigo_postal',
        'telefono_fijo',
        'telefono_celular',
        'correo_electronico',
        'estado'
    ];
}
