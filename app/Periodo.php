<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Periodo extends Model
{
    //
    protected $fillable = [
        'nombre',
        'fecha_inicial',
        'fecha_final',
        'estado',
        'ano'
    ];
}
