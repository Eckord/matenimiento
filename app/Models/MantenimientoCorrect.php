<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MantenimientoCorrect extends Model
{
    use HasFactory;

    protected $table = 'mantcorrect';  
    protected $casts = [
        'estado' => 'int',
        ]; 
    protected $fillable = [
            'hardware_actual',
            'software_actual',
            'estado'

    ];     
}
