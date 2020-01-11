<?php
namespace App\Services;

use Illuminate\Http\Request;
use App\UserFormData;



class FrontService
{
	public function __construct() {
 

    }


    public function storeUserFormData($request,$formInfo){
        $response=false;
        $fields=$formInfo->fields;
        $data=array(); 
        $token =$this->generateToken();
        foreach ($fields as  $field) {
            $data[] =array(
                'form_information_id'=>$field->form_information_id,
                'formfield_id'=>$field->id,
                'field_value'=>$request->input($field->id),
                'user_id'   =>0,
                'token'     =>$token,
                'ip_address'=>$request->input('ip','127.0.0.1')
            );
          $response= UserFormData::insert($data);
        }
        return $response;
    }

    private function generateToken()
    {
        return md5(rand(1, 10) . microtime());
    }
      
}





          
