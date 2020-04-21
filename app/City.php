<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    //
    protected $fillable=[
        'nombre'
    ];

    public function Departament(){
        return $this->belongsTo(country::class, 'id');
    }
}
