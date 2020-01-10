<?php

namespace App\Http\Controllers;

use App\FormInformation;
use Illuminate\Http\Request;
use App\InputTags;
use App\FormFields;
use Illuminate\Support\Facades\DB;

class FormInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {   
        return  view('customForm.show')->with([
            'formData' => (new FormInformation)->paginate(10)
        ]);
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(InputTags $input_tags)
    {   
        $inputtagData =$input_tags->query()->get();
        return  view('customForm.create' ,compact('inputtagData'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $form =new FormInformation;
        $fields =new FormFields;
        $temp_size =count($request->input_name);
        $form->name =$request->form_name;
       
        $res=$form->save();
       
        if($res){
            $data=array();
            for($i=0;$i<$temp_size;$i++){
                $data[] =array('name'=>$request->input_name[$i],
                              'form_information_id'=>$form->id,
                             'label'=>$request->label_name[$i],
                             'value' =>$request->input_tags[$i],
                             'input_type_id'=>$request->type[$i]           
                );
            }
            $fields->insert($data);
            session()->flash('success', __('Form Add successfully'));
        }else{
            session()->flash('error', __('Opps some  error occure'));
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FormInformation  $formInformation
     * @return \Illuminate\Http\Response
     */
    public function show(FormInformation $formInformation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FormInformation  $formInformation
     * @return \Illuminate\Http\Response
     */
    public function edit(FormInformation $forminformation)
    {
        
            $data= array(
                    'formData'=>$forminformation->load('fields.input'),
                    'inputtagData'=>InputTags::query()->get()
            );

            return view('customForm.edit')
                ->with($data);
   }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FormInformation  $formInformation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FormInformation $forminformation)
    {
        
        $fields =new FormFields;
        $temp_size =count($request->input_name);
        $forminformation->name =$request->form_name;
        $res=$forminformation->update();
        if($res){
                
            $updateRow=0;
            $fieldData=$forminformation->fields;
                foreach ($fieldData as $index => $field) {
                    $updateData =array('name'=>$request->input_name[$index],
                                  'form_information_id'=>$forminformation->id,
                                 'label'=>$request->label_name[$index],
                                 'value' =>$request->input_tags[$index],
                                 'input_type_id'=>$request->type[$index]           
                    );
                 $fields->where('id',$field->id)->update($updateData);
                 $updateRow=$index;
            }
            $updateRow=$updateRow+1;
            $data=array();
            if($temp_size >$updateRow){
                for($i=$updateRow;$i<$temp_size;$i++){
                    $data[] =array('name'=>$request->input_name[$i],
                                  'form_information_id'=>$forminformation->id,
                                 'label'=>$request->label_name[$i],
                                 'value' =>$request->input_tags[$i],
                                 'input_type_id'=>$request->type[$i]           
                    );
                }
              
                $fields->insert($data);
            }
    
        
            session()->flash('success', __('Form Update successfully'));
        }else{
            session()->flash('error', __('Opps some  error occure'));
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FormInformation  $formInformation
     * @return \Illuminate\Http\Response
     */
    public function destroy(FormInformation $formInformation)
    {
        //
    }
}
