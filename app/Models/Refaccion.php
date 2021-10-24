<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Refaccion extends Model
{
    use HasFactory;

    protected $table = 'refacciones';

    protected $casts = [
        'costo' => 'float',
        'estado' => 'int'
    ];

    protected $fillable = [
        'numSerie',
        'nombre_refaccion',
        'descripcion',
        'costo',
        'estado'
    ];
}
