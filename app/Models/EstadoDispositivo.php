<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoDispositivo extends Model
{
    use HasFactory;

    protected $table = 'estadodispositivo';

    protected $casts = [
        'enciende' => 'int', 
        'colores_correctos' => 'int',
        'botones_completos' => 'int',
        'golpeado' => 'int'
    ];

    protected $fillable = [
        'idEstadoDispositivo',
        'enciende',
        'colores_correctos',
        'botones_completos',
        'golpeado',
        'condiciones_fisicas',
        'sistema_operativo',
        'contrasenia'
    ];
}
