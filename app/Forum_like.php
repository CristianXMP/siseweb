<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forum_like extends Model
{
    protected $fillable = [
        'forum_id',
        'student_id',
        'teacher_id',

    ];


    //relaciones con forum

    public function Forum()
    {
        $this->belongsTo(Forum::class);
    }

    //relaciones con student
    public function Student()
    {
        $this->belongsTo(Student::class);
    }

    //relaciones con teacher
    public function Teacher()
    {
        $this->belongsTo(Teacher::class);
    }
}
