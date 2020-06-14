<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    //

  protected  $fillable = [
    'academic_assignment_id',
    'title',
    'description',
    'deliver_date',
    'resource',
    'state'
    ];


    //carga academica

    public function Academic_assignment(){
        return $this->belongsTo(Academic_assignment::class);
    }
}
