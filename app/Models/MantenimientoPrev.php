<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MantenimientoPrev extends Model
{
    use HasFactory;

    protected $table = 'mantprev';
    protected $casts = [
        'estado' => 'int',
        ];         
    protected $fillable = [
            'actividad',
            'descripcion',
            'insumos_utilizados',
            'estado'

    ];  
}
