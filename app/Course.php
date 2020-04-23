<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable=[
        'couser','variation','working_day','teacher_id'
    ];

    public function students(){
        return $this->hasMany('App\Student' , 'course_id');
    }

    public function teachers(){
        return $this->hasMany('App\Teacher' , 'course_id');
    }
}
