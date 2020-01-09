@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{$table_head->name}} Form Data</div>

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
         
                              
                              <tr>
                                  
                                    
                              </tr>

                    
                              
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
    
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('formfields.currentFormAjaxData',$table_head->id) }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'detail', name: 'detail'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

   }); 
</script>

@endsection