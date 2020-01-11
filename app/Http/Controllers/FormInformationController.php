<?php

namespace App\Http\Controllers;

use App\FormInformation;
use Illuminate\Http\Request;
use App\InputTags;
use App\FormFields;
use App\Services\FormInformationService;
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
        $this->formInformationService = new FormInformationService;
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
        //store defination defined inside storeFormInformation method 
        $response =$this->formInformationService->storeFormInformation($request);
        if($response){
            session()->flash('success','Form Add successfully');
        }else{
            session()->flash('error','Opps some  error occure');
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
         // update form infomation defination defined inside store updateFormInformation method
        $res=$this->formInformationService->updateFormInformation($request,$forminformation);
        if($res){
            session()->flash('success','Form Update successfully');
        }else{
            session()->flash('error','Opps some  error occure');
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

    public function customDelete(FormInformation $forminformation){
  
        $res =$forminformation->delete();
        session()->flash('success', 'Form field delete successfully'); 
        return back();

    } 
}
