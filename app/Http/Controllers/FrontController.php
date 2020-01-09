<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\FormInformation;


class FrontController extends Controller
{
    public function index(){

        return  view('front.form')->with([
            'formData' => (new FormInformation)->paginate(10)
        ]);
    }

    public function currentForm(FormInformation $form_information){

    	return view('front.currentForm')
    			->with(
    				'formData',$form_information
    							->load('fields.input')
    							
    			);
    }

    public function store(Request $request,FormInformation $form_information)
    {
        //
        
        $fields=$form_information->fields;
   		$data=array(); 
        foreach ($fields as  $field) {
        	$data[] =array(
        		'form_information_id'=>$field->form_information_id,
        		'formfield_id'=>$field->id,
        		'field_value'=>$request->input($field->input_type_id),
        		'user_id'	=>0,
        		'ip_address'=>$request->input('ip','127.0.0.1')


        	);
      
        }
	if(UserFormData::insert($data)){
  
            session()->flash('success', __('Form data Submit successfully'));
        }else{
            session()->flash('error', __('Opps some  error occure'));
        }
        return redirect()->back();
    }


}
