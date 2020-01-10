@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{$table_head->name}} Form Data 
                    
                </div>

                <div class="card-body">
                  
                
                            <table class="table table-striped table-advance table-bordered data-table">
                              <thead>
                              <tr>
                                  <th>S.no</th>
                           <!--        <th>IP Address </th>
                                  <th> User Name </th> -->
                                  @foreach ($table_head->fields as $head)
                                  <th>{{$head->name}}</th>
                                  @endforeach
                                  
                                </tr>
                              </thead>
                              <tbody>
                                    @php $i=1; @endphp
                                    @foreach ($data as $index=>$parentData)  
                                    <tr>
                                      <td>{{$i ++}}</td>
                                      @foreach ($parentData as $childData)
                                        <td>{{$childData}}</td>
                                      @endforeach
                                    </tr>  
                            

                               @endforeach
                          
                              </tbody>
                          </table>
                      

                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
  

    $(function () {
     
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });
    columnData =[];
    columnData.push();
    // $.ajax({
    // type : 'GET',
    // url  : '{{ route('formfields.currentFormAjaxData',$table_head->id) }}',
    // datatype: 'json',

    // success :  function(result)
    //     {
          
    //       $.each(result['data'], function(key,val) {

    //         $.each(val, function(childKey,childVal) {
               
    //            // columnData.push({data:'"'+childKey+'",'+name:'"'+childVal+'",'+orderable:true});
            
    //         }); 
            
    //       });
    //       // columns.push(childData);
    //       console.log(columnData);
    //       var table = $('.data-table').DataTable({
    //               draw:0,
    //               recordsFiltered:2,
    //               recordsTotal:2,
                
                
    //               column: [
    //                   { data: 'DT_RowIndex',name: 'DT_RowIndex',"searchable":false,"orderable":false},
    //                   { data: 'full name',name: 'full name',"searchable": false,"orderable":false},
    //                   {data: 'password',name: 'password',"searchable": false,"orderable":false},
    //                   {data: 'email',name: 'password',"searchable": false,"orderable":false}
    //                 ]

    //       } );
            
             
    //     }
      

    // }); 

 
 
   }); 
</script>

@endsection