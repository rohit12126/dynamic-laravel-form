<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserFormData extends Model
{
    protected $table = 'user_form_data';
    public function formInfo(){

    	return $this->hasMany(FormInformation::class,'form_informatin_id');
    }
}
