@extends('layouts.master')
@section('title', 'Application Periods')
@section('content')
<section class="content">
  <div class="container-fluid">

    <br><br>
    <div class="row">
      <div class="col-12">
        @if ($message = Session::get('success'))
        <div class="alert alert-light alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button> 
          <strong>{{ $message }}</strong>
        </div>
        @endif
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">List of Application Period</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-hover">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createApplicationPeriod">
                    <i class="fas fa-plus"></i>  Add
                  </button>
                  @include('applicationperiod.create')
               
              <thead>
                
              <tr>
                <th>Id</th>
                <th>Academic Year</th>
                <th>Semester</th>
                <th>Start of Application</th>
                <th>End of Application</th>
                <th>Scholarship Expiration</th>
                <th>Edit</th>
                <th>Actions</th>
        

              </tr>
              </thead>
             
              <tfoot>
                <tbody>
                  @foreach ( $appliperiods as $appliperiod )
                    <tr>
                      <td>{{ $appliperiod->applicationPeriod_id}}</td>
                      <td>{{ $appliperiod->acadyear->description}}</td>
                      <td>{{ $appliperiod->semester}}</td>
                      <td>{{ $appliperiod->start_application}}</td>
                      <td>{{ $appliperiod->end_application}}</td>
                      <td>{{ $appliperiod->scholarship_expiration}}</td>
 
                      <td align="center">
                        @if (!$appliperiod->deleted_at)
                        <a href="#editApplicationPeriod{{$appliperiod->applicationPeriod_id}}" class="badge badge-pill badge-primary" data-toggle="modal"  >Edit</a>
                       
                        @else
                        <a class="badge badge-pill badge-secondary">Edit</a> <br>
                        @endif
                      </td>
                      @include('applicationperiod.edit')  
                      
                     
                      <td align="center">
                        @if(!$appliperiod->deleted_at)
                        <a class="badge badge-pill badge-secondary">Restore</a> <br>
                        {!! Form::open(array('route' => array('applicationperiod.destroy', $appliperiod->applicationPeriod_id),'method'=>'DELETE')) !!}
                        <button class="badge badge-pill badge-danger">Delete </button>
                        {!! Form::close() !!}
                        @else
                        <a href="{{ route('applicationperiod.restore',$appliperiod->applicationPeriod_id) }}"class="badge badge-pill badge-warning" >Restore</a> <br>
                        <a class="badge badge-pill badge-secondary">Delete</a>
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