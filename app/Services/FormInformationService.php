<?php
namespace App\Services;

use Illuminate\Http\Request;
use App\FormInformation;
use App\FormFields;



class FormInformationService
{
	public function __construct() {
       $this->formInfo = new FormInformation;
       $this->field = new FormFields;
    }


    public function storeFormInformation($request){
        $response=false;
        $temp_size =count($request->input_name);
        $this->formInfo->name =$request->form_name;
        $res=$this->formInfo->save();
        if($res){
            $data=array();
            for($i=0;$i<$temp_size;$i++){
                $data[] =array('name'=>$request->input_name[$i],
                              'form_information_id'=>$this->formInfo->id,
                             'label'=>$request->label_name[$i],
                             'value' =>$request->input_tags[$i],
                             'input_type_id'=>$request->type[$i]           
                );
            }
            $response= $this->field->insert($data);
        }
        return $response;
    }

    public function updateFormInformation($request,$formInfo){
        $response =false;
        $temp_size =count($request->input_name);
        $formInfo->name =$request->form_name;
        $res=$formInfo->update();
        if($res){
            $updateRow=0;
            $fieldData=$formInfo->fields;
                foreach ($fieldData as $index => $field) {
                    $updateData =array('name'=>$request->input_name[$index],
                                  'form_information_id'=>$formInfo->id,
                                 'label'=>$request->label_name[$index],
                                 'value' =>$request->input_tags[$index],
                                 'input_type_id'=>$request->type[$index]           
                    );
                    $response=$this->field->where('id',$field->id)->update($updateData);
                    $updateRow=$index;
            }
            $updateRow=$updateRow+1;
            $data=array();
            if($temp_size >$updateRow){
                for($i=$updateRow;$i<$temp_size;$i++){
                    $data[] =array('name'=>$request->input_name[$i],
                                  'form_information_id'=>$formInfo->id,
                                 'label'=>$request->label_name[$i],
                                 'value' =>$request->input_tags[$i],
                                 'input_type_id'=>$request->type[$i]           
                    );
                }
               $response= $this->field->insert($data);
            }
        }
        return $response;    
    }
              
                


}
