<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormFields extends Model
{
    //
    protected $table = 'formfields';

    public function input(){

    	return $this->belongsTo(InputTags::class,'input_type_id');
    }
}
