<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeguimientoOrden extends Model
{
    use HasFactory;
    
    protected $table = 'seguimientoorden';

    protected $casts = [
        'fecha_asignacion' =>'datetime:d-m-Y',
        'fecha_entrega' => 'datetime:d-m-Y',
        'fecha_entrega_final' => 'datetime:d-m-Y',
        'personal_id' => 'int',
        'personal_asignado_id' => 'int'
    ];

    protected $fillable = [
        'fecha_asignacion',
        'fecha_entrega',
        'fecha_entrega_final',
        'personal_id',
        'personal_asignado_id'
    ];

    public function usuario(){
        return $this->belongsTo('App\Models\User', 'users_id');
    }
    public function personal_asignado(){
        return $this->belongsTo('App\Models\User', 'personal_asignado_id');
    }    
}
