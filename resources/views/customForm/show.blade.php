@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Form Information</div>

                <div class="card-body">
                  
                
                            <table class="table table-striped table-advance table-hover">
                              <thead>
                              <tr>
                                  <th>S.no</th>
                                  <th>Form Name</th>
                                
                                  <th>Action</th>
                               
                              </tr>
                              </thead>
                              <tbody>
                   
                              @foreach ($formData as $index=> $data)  
                              
                              <tr>
                                  <td> {{$index + 1}} </td>
                                  <td>{{$data->name}}</td>
                             
   

                                  <td>
                                    <a href="{{route('forminformation.edit',['forminformation' => $data->id])}}" class="btn btn-primary btn-sm tooltips" data-original-title="Update {{$data->name}} details"><i class="fa fa-pencil">edit</i></a>
                                    <a href="{{route('formfields.currentForm', $data->id)}}" class="btn btn-primary btn-sm tooltips" data-original-title="Update {{$data->name}} details"><i class="fa fa-pencil">view</i></a>
                                  </td>
                                     
                      
                                    
                              </tr>

                              @endforeach
                              
                              </tbody>
                          </table>
                          {{ $formData->links() }}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
