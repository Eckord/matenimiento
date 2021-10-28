<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MantCorrectHasRefacciones extends Model
{
    use HasFactory;

    protected $table = 'mant_correct_has_refacciones';
    protected $casts = [
        'mantCorrect_idMantCorrect' => 'int', 
        'refacciones_numSerie' => 'int'
    ];    

    protected $fillable = [
            'mantCorrect_idMantCorrect',
            'refacciones_numSerie_id'

    ];    
    public function refacciones(){
        return $this->belongsTo('App\Models\Refaccion', 'refacciones_numSerie_id');
    }   
    public function mantenimientoCorrectivo(){
        return $this->belongsTo('App\Models\MantenimientoCorrect', 'mantCorrect_idMantCorrect');
    }    
}
