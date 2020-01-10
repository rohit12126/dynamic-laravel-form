@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{$formData->name}}</div>

                <div class="card-body">
                  <form class="form-horizontal" method="POST" action="{{route('front.userFormData',$formData->id)}}">
                    @csrf
                    @foreach($formData->fields as $field)

                  

                      <div class="form-group">
                        <label class="control-label col-sm-2" for="email">{{$field->label}}:</label>
                        <div class="col-sm-10">
                          <input type="{{$field->input->name}}" class="form-control" name="{{$field->id}}" >
                        </div>
                      </div>

                    @endforeach  
             
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                      </div>
                    </form>

                
                           

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
