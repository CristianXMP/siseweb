<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    //
    protected $fillable=[
        'nombre','abreviatura','departament_id'
    ];

    public function Departament(){
        return $this->belongsTo('App\departament', 'departament_id');
    }

    public function Student(){
        return $this->hasMany('App\Student', 'city_id');
    }

    public function Teacher(){
        return $this->hasMany('App\Teacher', 'city_id');
    }
}
