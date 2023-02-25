@extends('layouts.master')
@section('title', ' List of Employees')
@section('content')

<section class="content">
  <div class="container-fluid">

    <br><br>
    @if ($message = Session::get('success'))
    <div class="alert alert-primary alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button> 
    <strong>{{ $message }}</strong>
  </div>
@endif
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">List of Employees Account</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-hover">
              <thead>
              <tr>
                
                <th>Name</th>
                <th>Employee Id</th>
                <th>Addressline</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Actions</th>
            
              
        

              </tr>
              </thead>
             
              <tfoot>
                <tbody>
              
                  @foreach ( $employees as $employee )
                    <tr>
                      
                      <td><img src="{{ asset('images/'.$employee->img_path) }}" alt="Product 1" class="img-circle img-size-32 mr-2">
                     {{ $employee->lname}}, {{ $employee->fname}}</td>
                     <td>{{ $employee->employee_id}}</td>
                      <td>{{ $employee->addressline}} {{ $employee->town }} {{ $employee->zipcode }}</td>
                      <td>{{ $employee->phone}}</td>
                      <td>{{ $employee->user->email}}</td>
                     

                      <td align="center">
                        @if(!$employee->deleted_at)
                        <a class="badge badge-pill badge-secondary">Activate</a> <br>
                        {!! Form::open(array('route' => array('employee.destroy', $employee->employee_id),'method'=>'DELETE')) !!}
                        <button class="badge badge-pill badge-danger">Deactivate </button>
                        {!! Form::close() !!}
                        @else
                          <a href="{{ route('employee.restore',$employee->employee_id) }}"class="badge badge-pill badge-warning" >Activate</a> <br>
                          <a class="badge badge-pill badge-secondary">Deactivate</a>
                        @endif
                      </td>
                     

                      
                        
                    </tr>
                 
                  @endforeach
                </tbody>
             
              </tfoot>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->


      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

  </div>


@include('layouts.foot')
<script>
    $(function () {
      $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
     
    })


    });
  </script>
</section>
@endsection