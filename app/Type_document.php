<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type_document extends Model
{

    protected $fillable =[
        'nombre','abreviatura'
    ];

    public function Type_documents(){
        return $this->hasMany('App\Type_document' , 'document_type_id');
    }

}
