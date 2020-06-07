<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FinalScore extends Model
{
    //
    protected $fillable=[
        'academic_assignment_id',
        'student_id',
        'forum_id',
        'job_id',
        'test_id',
        'qualification',

    ];

    public function student(){

        return $this->belongsTo(Student::class);
    }


}
