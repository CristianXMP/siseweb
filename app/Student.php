<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable =[
        'first_name','second_name',
        'last_name','city_id',
        'document_type_id','number_document',
        'expedition_date', 'birth_date','couser_id'
    ];




    public function type_document(){
        return $this->belongsTo('App\type_document', 'document_type_id');
    }

    public function city(){
        return $this->belongsTo('App\City', 'city_id');
    }

    public function course(){
        return $this->belongsTo('App\Course' , 'couser_id');
    }
}
