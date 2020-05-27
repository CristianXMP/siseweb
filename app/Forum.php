<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    //
    protected $fillable=[

        'academic_assignment_id',
        'title',
        'content',
        'datetime',
        'likecount',
        'comentcount'];


        public function Academic_assignment()
        {
            $this->belongsTo(Academic_assignment::class);
        }

}


