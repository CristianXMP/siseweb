<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable=[
        'couser','variation','working_day','teacher_id'
    ];

    public function students(){
        return $this->hasMany(Student::class);
    }

    public function teachers(){
        return $this->hasMany(Teacher::class);
    }
}
