<?php

namespace App\Http\Controllers;
use DataTables;
use App\FormInformation;
use Illuminate\Http\Request;
use App\InputTags;
use App\UserFormData;
use App\FormFields;
use Illuminate\Support\Facades\DB;



// use Illuminate\Support\Facades\DB;

class FormFieldController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function show(FormFields $FormFields)
    {
        return $FormFields->name;
    }


    public function currentFormAjaxData(FormInformation $formInfo){

		$userDatas = $formInfo->userFormData;
		
		$data=array();
		$formField =new FormFields;
		foreach ($userDatas as  $userData) {
    
            $formField= $formField->find($userData->formfield_id);  
            if(array_key_exists($userData->token,$data)){

            	$data[$userData->token][$formField->name]=$userData->field_value;
            }else{

				$data[$userData->token][$formField->name] = $userData->field_value; 
            } 
			# code...
		}
        
		return \DataTables::of($data)


        ->addIndexColumn()
        ->make(true);
 		// return $data;
           


 

    }

    public function currentForm(FormInformation $formInfo){

    	$userDatas = $formInfo->userFormData;
		
		$data=array();
		$formField =new FormFields;
		foreach ($userDatas as  $userData) {
    
            $formField= $formField->find($userData->formfield_id);  
            if(array_key_exists($userData->token,$data)){

            	$data[$userData->token][$formField->name]=$userData->field_value;
            }else{

				$data[$userData->token][$formField->name] = $userData->field_value; 
            } 
			# code...
		}
        $data =array('table_head'=>$formInfo->load('fields'),
        	'data'=>$data

        );
    	return view('customForm.customForm')->with($data);

    }
}
