<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InputTags extends Model
{

	protected $table = 'input_types';
	// public function formInfo(){

 //    	return $this->hasManyThrough('App\FormInformation','App\FormFields','input_type_id','id','id','id');
 //    }
}
