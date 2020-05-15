<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Academic_assignment extends Model
{
    //
    protected $fillable = [
        'course_id', 'period_id', 'subject_id', 'teacher_id'
    ];

    //relacion es entre asignacion academica peridos materias y profesor

    public function period()
    {
       return $this->belongsTo(Period::class);
    }

    public function teacher()
    {
       return $this->belongsTo(Teacher::class);
    }

    public function subject()
    {
       return $this->belongsTo(Subject::class);
    }

    public function course(){
        return $this->belongsTo(Course::class);
    }

    public function Advertisements()
    {

        return $this->hasMany(Advertisement::class);
    }

}
