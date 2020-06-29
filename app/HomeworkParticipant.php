<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomeworkParticipant extends Model
{
    //

    protected $fillable =[
        'student_id',
        'job_id',
        'homework',
        'quelify',
        'description',
        'state'
    ];

    //info estudiantes

    public function student(){
        return $this->belongsTo(student::class);
    }

    //info homework

    public function homework(){

        return $this->belongsTo(Job::class);
    }
}
