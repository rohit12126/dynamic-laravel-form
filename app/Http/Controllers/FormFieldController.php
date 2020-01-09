<?php

namespace App\Http\Controllers;
use DataTables;
use App\FormInformation;
use Illuminate\Http\Request;
use App\InputTags;
use App\UserFormData;



// use Illuminate\Support\Facades\DB;

class FormFieldController extends Controller
{
    //
     public function show(FormFields $FormFields)
    {
        return $FormFields->name;
    }


    public function currentFormAjaxData(FormInformation $form_information){

    	// dd($form_information);
    	
    	$form_information->load(['user_form_data','fields'])->groupBy('user_form_data.token','user_form_data.form_information_id');



    	$fields = $form_information->fields->pluck('name','id')->toArray();

    	// return $form_information->user_form_data->toArray();
   

        $user_form_data = $form_information->user_form_data->pluck('field_value','formfield_id');
       
        foreach ($user_form_data as $key => $value) {
        	# code...
        }
        
        return $user_form_data;  
		$user_form_data = $user_form_data->map(function ($item, $key) use($fields) {

    		$data = [
    			'name'=>$key,
    			'value'=>'-',
    			
    		];
    	
            return $item;
            // dd($key);
		    if (!empty($fields[$key])) {
		    	$data['name'] = $fields[$key];

		    	$data['value'] = $item;
		        $item = $data;
		    }
		    return  $item;
		});
        
        return $user_form_data;
		// return Datatables::of($user_form_data)
  //                   ->addIndexColumn()
                   
                  
  //                   ->make(true);
 

    }

    public function currentForm(FormInformation $form_information){

    	
    	// return $form_information->load('fields');
    	return view('customForm.customForm')->with('table_head',$form_information->load('fields'));

    }
}
