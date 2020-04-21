<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class country extends Model
{
    protected $fillable =[
        'nombre','abreviatura'
    ];

    public function departaments(){
        return $this->hasMany(Departament::class , 'countries_id');
    }
}
