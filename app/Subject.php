<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    //
    protected $fillable = [
        'nombre', 'abreviatura'
    ];

    //hastomany academic_assignment

    public function academic_assignments()
    {
        $this->hasMany(Academic_assignment::class);
    }
}
