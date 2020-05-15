<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{

    protected $fillable = [
        'first_name', 'second_name',
        'last_name', 'city_id', 'profession',
        'type_document_id', 'number_document',
        'expedition_date', 'birth_date'
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function course()
    {

        return $this->hasOne(Course::class);
    }

    public function type_document()
    {
        return $this->belongsTo(Type_document::class);
    }

    //hastomany academic_assignment

    public function academic_assignments()
    {
       return $this->hasMany(Academic_assignment::class);
    }

    //1 - m user - teacher

    public function user(){
        return $this->hasMany(User::class);
    }

    public function Advertisements(){

        return $this->hasMany(Advertisement::class);
    }
}
