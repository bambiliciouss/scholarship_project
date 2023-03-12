@extends('layouts.master')
@section('title', 'Academic Year')
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
            <h3 class="card-title">List of Academic Year</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-hover">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createAcademicYear">
                    <i class="fas fa-plus"></i>  Add
                  </button>
                  @include('academicyear.create')
               
              <thead>
                
              <tr>
                <th>Academic Year Id</th>
                <th>Description</th>
                {{-- <th>Edit</th> --}}
                <th>Actions</th>
        

              </tr>
              </thead>
             
              <tfoot>
                <tbody>
                  @foreach ( $acadyears as $acadyear )
                    <tr>
                      <td>{{ $acadyear->acadyears_id}}</td>
                      <td>{{ $acadyear->description}}</td>
                      
                    
                      {{-- <td align="center">
                        @if (!$acadyear->deleted_at)
                        <a href="#editAcademicYear{{$acadyear->acadyears_id}}" class="badge badge-pill badge-primary" data-toggle="modal"  >Edit</a>
                       
                        @else
                        <a class="badge badge-pill badge-secondary">Edit</a> <br>
                        @endif
                      </td> --}}
                      
                      @include('academicyear.edit')  
                      <td align="center">
                        @if(!$acadyear->deleted_at)
                        <a href="#editAcademicYear{{$acadyear->acadyears_id}}" class="badge badge-pill badge-primary" data-toggle="modal"  >Edit</a>
                        <br>
                        <a class="badge badge-pill badge-secondary">Restore</a>
                        <br>
                        {!! Form::open(array('route' => array('academicyear.destroy', $acadyear->acadyears_id),'method'=>'DELETE')) !!}
                        <button class="badge badge-pill badge-danger">Delete </button>
                        {!! Form::close() !!}
                        @else
                        <a class="badge badge-pill badge-secondary">Edit</a> <br>
                        <a href="{{ route('academicyear.restore',$acadyear->acadyears_id) }}"class="badge badge-pill badge-warning" >Restore</a> <br>
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