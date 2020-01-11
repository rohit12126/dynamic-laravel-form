<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\FormInformation;
use App\UserFormData;
use App\Services\FrontService;


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
        $frontService=new FrontService;
        // store Data userdata inside storeUserFormData
        $response=$frontService->storeUserFormData($request,$form_information);
        
	if($response){
            session()->flash('success','Form data Submit successfully');
        }else{
            session()->flash('error','Opps some  error occure');
        }
        return redirect()->back();
    }
  
}

   


