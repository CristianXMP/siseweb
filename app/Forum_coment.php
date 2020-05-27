<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forum_coment extends Model
{
    //

   protected $fillable=[
       'forum_id',
       'name_user',
       'type_user',
       'coment'
   ];



}

