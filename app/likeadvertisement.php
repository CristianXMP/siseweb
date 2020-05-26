<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class likeadvertisement extends Model
{
    //
    protected $fillable = ['advertisement_id','student_id'];


    public function advertisement(){
        return $this->belongsTo(Advertisement::class);
    }

    public function student(){
        return $this->belongsTo(Student::class);
    }
}




