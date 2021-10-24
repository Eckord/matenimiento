<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    use HasFactory;
    
    protected $table = 'personal';

    protected $casts = [
        'estado' => 'int',
        'users_id' => 'int'
    ];

    protected $fillable = [
        'cargo',
        'estado',
        'users_id'
    ];

    public function users(){
        return $this->belongsTo('App\Models\Users', 'users_id');
    }
}
