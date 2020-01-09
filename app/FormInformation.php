<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormInformation extends Model
{
    protected $table = 'form_information';

    public function fields(){

    	return $this->hasMany(FormFields::class);
    }

    public function user_form_data(){

    	return $this->hasMany(UserFormData::class);
    }

}
