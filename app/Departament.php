<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departament extends Model
{
    protected $fillable=[
        'nombre','abreviatura','countries_id'
    ];

    public function Pais(){
        return $this->belongsTo(country::class, 'id');
    }

    public function cities(){
        return $this->hasMany(City::class, 'departament_id');
    }
}
