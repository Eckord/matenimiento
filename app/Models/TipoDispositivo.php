<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoDispositivo extends Model
{
    use HasFactory;
    
    protected $table = 'tipodispositivo';

    protected $fillable = [
        'tipo_dispositivo',
        'descripcion'
    ];
}
