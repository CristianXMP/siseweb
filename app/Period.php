<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    //
    protected $fillable = [
        'nombre', 'fecha_inicial', 'fecha_final'
    ];

    //hastomany academic_assignment

    public function academic_assignments()
    {
        $this->hasMany(Academic_assignment::class);
    }
}
