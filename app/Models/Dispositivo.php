<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Dispositivo extends Model
{
    use HasFactory;
    
    protected $table = 'dispositivo';

    protected $casts = [
        'estado' => 'int',
        'tipoDispositivo_id' => 'int',
        'estadoDispositivo_id' => 'int',
        'software_id' =>'int'
    ];

    protected $fillable = [
        'numSerie',
        'nombre_dispositivo',
        'marca',
        'modelo',
        'estado',
        'tipoDispositivo_id',
        'estadoDispositivo_id',
        'software_id'
    ];

    public function tipoDispositivo(){
        return $this->belongsTo('App\Models\TipoDispositivo', 'tipoDispositivo_id');
    }

    public function estadoDispositivo(){
        return $this->belongsTo('App\Models\EstadoDispositivo', 'estadoDispositivo_id');
    }

    public function software(){
        return $this->belongsTo('App\Models\Software', 'software_id');
    }
}
