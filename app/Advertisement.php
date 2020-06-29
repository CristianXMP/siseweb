<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    //

    protected $fillable = [
        'Academic_assignment_id', 'announced', 'datatime', 'likes'
    ];



    public function Advertisement()
    {
        return $this->belongsTo(Academic_assignment::class);
    }
    //likes
    public function likeadvertisements()
    {

        return $this->hasMany(likeadvertisement::class);
    }
}
