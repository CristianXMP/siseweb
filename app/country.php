<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = [
        'nombre', 'abreviatura'
    ];

    public function departaments()
    {
        return $this->hasMany('App\Departament', 'countries_id');
    }
}