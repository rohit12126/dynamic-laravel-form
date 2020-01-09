@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Form </div>

                <div class="card-body">
                  
                
                            <table class="table table-striped table-advance table-hover">
                              <thead>
                              <tr>
                              
                                  <th>Form Name</th>
                                
                           
                               
                              </tr>
                              </thead>
                              <tbody>
                   
                              @foreach ($formData as $index=> $data)  
                              
                              <tr>
                               
                                  <td><a href="{{route('front.currentForm',$data->id)}}" target="_blank"> {{$data->name}}</a></td>
                             
   

                             
                                     
                      
                                    
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
