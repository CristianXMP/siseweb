<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Student extends Model
{
    protected $fillable = [
        'first_name', 'second_name',
        'last_name', 'city_id',
        'document_type_id', 'number_document',
        'expedition_date', 'birth_date', 'course_id'
    ];




    public function type_document()
    {
        return $this->belongsTo('App\type_document', 'document_type_id');
    }

    public function city()
    {
        return $this->belongsTo('App\City', 'city_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    // 1- m users students
    public function user(){

        return $this->hasMany(User::class);
    }

    public function Advertisements(){

        return $this->hasMany(Advertisement::class);
    }

    public function likeadvertisements(){
        return $this->hasMany(likeadvertisement::class);
    }

    //relacion con la tabla Forums

    public function Forums()
    {
        $this->hasMany(Forum::class);
    }


    public function Forum_coments()
    {
      return  $this->hasMany(Forum_coment::class);
    }

    public function participants_forums(){

        return $this->hasMany(ForumParticipant::class);
    }

 

}
