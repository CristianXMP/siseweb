<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FinalScore extends Model
{
    //
    protected $fillable = [
        'academic_assignment_id',
        'student_id',
        'forum_id',
        'job_id',
        'test_id',
        'qualification',

    ];
    //estudiante
    public function student()
    {

        return $this->belongsTo(Student::class);
    }
    //foro
    public function forum()
    {

        return $this->belongsTo(Forum::class);
    }
    //tarea
    public function job()
    {

        return $this->belongsTo(Job::class);
    }
}
