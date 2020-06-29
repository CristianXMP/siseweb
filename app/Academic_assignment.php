<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Academic_assignment extends Model
{
    //
    protected $fillable = [
        'course_id', 'period_id', 'subject_id', 'teacher_id'
    ];

    //perdiodo

    public function period()
    {
        return $this->belongsTo(Period::class);
    }
    //profesor
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
    //materia
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
    //curso
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    //anuncios
    public function Advertisements()
    {

        return $this->hasMany(Advertisement::class);
    }

    //foros

    public function Forums()
    {
        $this->hasMany(Forum::class);
    }

    //tareas

    public function Homeworks()
    {
        return $this->hasMany(Job::class);
    }
}
