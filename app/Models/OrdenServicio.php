<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdenServicio extends Model
{
    use HasFactory;

    protected $table = 'ordenservicio';

    protected $casts = [
        'costo_estimado' => 'float',
        'costo_final' => 'float',
        'cliente_id' => 'int'
    ];

    protected $fillable = [
        'diagnostico_rapido',
        'costo_estimado',
        'diagnostico_final',
        'costo_final',
        'cliente_id'
    ];

    public function cliente(){
        return $this->belongsTo('App\Models\Cliente', 'cliente_id');
    }
}