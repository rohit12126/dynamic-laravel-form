<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormInformation extends Model
{
    protected $table = 'form_information';

    public function fields(){

    	return $this->hasMany(FormFields::class);
    }

    public function userFormData(){

    	return $this->hasManyThrough(UserFormData::class,FormFields::class,'form_information_id','formfield_id');
    }



    

}
