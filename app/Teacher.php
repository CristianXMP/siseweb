<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{

    protected $fillable =[
        'first_name','second_name',
        'last_name','city_id','profession',
        'type_document_id','number_document',
        'expedition_date', 'birth_date'
    ];

    public function city(){
        return $this->belongsTo(City::class);
    }

   public function courses(){

    return $this->hasMany(Course::class);

   }

   public function type_document(){
       return$this->belongsTo(Type_document::class);
   }
}
