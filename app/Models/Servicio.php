<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;

    protected $table = 'servicio';
    protected $casts = [
        'estado' => 'int',
        'ordenServicio_id' => 'int',
        'ordenSeguimiento_id' => 'int'
    ];

    protected $fillable = [
        'estado',
        'ordenServicio_id',
        'ordenSeguimiento_id',
        'dispositivo_id'
    ];

    public function ordenServicio(){
        return $this->belongsTo('App\Models\OrdenServicio', 'ordenServicio_id');
    }

    public function seguimientoOrden(){
        return $this->belongsTo('App\Models\SeguimientoOrden', 'ordenSeguimiento_id');
    }

    public function dispositivo(){
        return $this->belongsTo('App\Models\Dispositivo', 'dispositivo_id');
    }
}
