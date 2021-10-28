<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mantenimiento extends Model
{
    use HasFactory;

    protected $table = 'mantenimiento';
    protected $casts = [
        'estado' => 'int',
        'costo_final' => 'float',
        'mantPrev_idMantPrevent' => 'int', 
        'mantCorrect_idMantCorrect' => 'int',
        'servicio_id' => 'int'
    ];    

    protected $fillable = [
        'estado',
        'costo_final',
        'mantPrev_idMantPrevent', 
        'mantCorrect_idMantCorrect',
        'servicio_id'

    ];

    public function mantenimientoPrev(){
        return $this->belongsTo('App\Models\MantenimientoPrev', 'mantPrev_idMantPrevent');
    }   
    public function mantenimientoCorrect(){
        return $this->belongsTo('App\Models\MantenimientoCorrect', 'mantCorrect_idMantCorrect');
    } 
    public function servicio(){
        return $this->belongsTo('App\Models\Servicio', 'servicio_id');
    }              
}
