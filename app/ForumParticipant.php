<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ForumParticipant extends Model
{
    protected $fillable = [
        'forum_id',
        'student_id',
        'state'

    ];
    //traemos todos los estudiantes que han participado del foro

    public function student(){

        return $this->belongsTo(Student::class);
    }
}
