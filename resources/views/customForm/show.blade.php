@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Form Information
                   <a class="btn btn-success float-right" href="{{route('forminformation.create')}}">Add From</a> 
                </div>

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
                                    <a href="{{route('forminformation.edit',['forminformation' => $data->id])}}" class="btn btn-info btn-sm tooltips" data-original-title="Update {{$data->name}} details"><i class="fa fa-pencil"></i></a>
                                    <a href="{{route('formfields.currentForm', $data->id)}}" class="btn btn-primary btn-sm tooltips" data-original-title="Update {{$data->name}} details"><i class="fa fa-eye"></i></a>
                                    <a href="javascript:;" onclick="return confirmBox(`Do you want to delete it ?`,`{{route('forminformation.customDelete',['forminformation'=>$data->id])}}`)"  class="btn btn-danger btn-sm tooltips" data-original-title="Update {{$data->name}} details"><i class="fa fa-trash"></i></a>
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
