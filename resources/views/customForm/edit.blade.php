@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Form Information</div>

                <div class="card-body">
                    <form method="POST" onkeydown="return event.key != 'Enter';" class="form-horizontal" action="{{route('forminformation.update',['forminformation'=>$formData->id])}}">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="formname" class="col-sm-2 col-form-label">Form Name</label>
                            <div class="col-sm-10">
                            <input type="text" placeholder="Enter Form Name" class="form-control-plaintext" name="form_name"  value="{{ old('form_name', $formData->name)}}">
                            </div>

                        </div>

                        <div class="after-add-more">
                            @foreach($formData->fields as $index=>$field)
                               
                    
                            <div class="form-group custom-group row">
                                <label for="inputname" class="col-sm-2 col-form-label">Field Info</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control"  name="input_name[]" value="{{ old('input_name[$i]', $field->name)}}" placeholder="Input name">

                                </div>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control"  name="label_name[]"  value="{{ old('input_name[$i]', $field->label)}}" placeholder="Label Name">
                                    
                                </div>
                        
                                <div class="col-sm-2">
                                    
                                    <select class="form-control input-types " name="type[]" placeholder="Select input type">
                                        @foreach ($inputtagData as  $tag)  
                                         <option value="{{$tag->id}}" @if($field->input->id==$tag->id) selected @endif >{{$tag->name}}</option>
                                

                                       @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-2 custom-input-tags" @if($field->input->id!=2 || $field->input->id!=3) style="display:none;" @endif>

                                    <input type="text"  class="form-control"  name="input_tags[]" placeholder="Input Tags" data-role="tagsinput" >

                                    
                                </div>
                        
                                @if ($index==0)
                                    <button class="btn btn-primary add-more" type="button"><i class="fa fa-plus"></i></button>
                                @else
                                    <button onclick="return confirmBox(`Do you want to delete it your related data also will be delete it ?`,`{{ route('formfields.customDelete',['formfield'=>$field->id])}}`)"  class="btn btn-danger remove" type="button"><i class="fa fa-times"></i></button>
                                @endif
                            </div>
                            @endforeach
                        </div>    
                       
                        <button type="submit" class="btn btn-primary">Update Form</button>

                    </form>
                
                        <div class="copy hide" style="display:none;">
                            <div class="form-group custom-group row">
                                <label for="inputname" class="col-sm-2 col-form-label">Field Info</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" name="input_name[]" placeholder="Input name">

                                </div>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control"  name="label_name[]" placeholder="Label Name">
                                    
                                </div>
                        
                                <div class="col-sm-2">
                                   <select class="form-control input-types" name="type[]" placeholder="Select input type">
                                    @foreach ($inputtagData as $index=> $tag)  
                                     <option value="{{$tag->id}}">{{$tag->name}}</option>
                            

                                   @endforeach
                                </select>
                                </div>
                                <div class="col-sm-2 custom-input-tags" style="display:none;">
                                 <input type="text" class="form-control custom-tag"  name="input_tags[]" placeholder="Input Tags" data-role="tagsinput" >
                                
                                </div>
                                <button class="btn btn-danger custom-remove" type="button"><i class="fa fa-times"></i></button>
                            </div>         
                        </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
