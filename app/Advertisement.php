<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    //

    protected $fillable = [
    'course_id','teacher_id','subject_id', 'announced','datatime','likes'
    ];




   public function course(){

    return $this->belongsTo(Course::class);

   }

   public function teacher(){

    return $this->belongsTo(Teacher::class);

   }

   public function subject(){

    return $this->belongsTo(Subject::class);

   }
    public function likeadvertisements(){
        
        return $this->hasMany(likeadvertisement::class);
    }

}
