<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'course', 'variation', 'working_day', 'teacher_id'
    ];

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function academic_assignments()
    {
      return  $this->hasMany(Academic_assignment::class);
    }

    public function teacher()
    {

        return $this->belongsTo(Teacher::class);
    }


    public function Advertisements(){

        return $this->hasMany(Advertisement::class);
    }
}
