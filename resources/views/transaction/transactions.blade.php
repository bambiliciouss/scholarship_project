@extends('layouts.master')
@section('title', 'Applications')
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
            <h3 class="card-title">List of Applications</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-hover">
                
               
              <thead>
                
              <tr>
                <th>Transaction ID</th>
                <th>Student Name</th>
                <th>School Name</th>
                <th>Year Level</th>
                <th>Application Status</th>
                <th>Application Period</th>
                <th>Scholarship</th>
                {{-- <th>Enrolment Form</th>
                <th>Grades</th>
                <th>Junior Record</th>
                <th>Senior Record</th>
                <th>Valid ID</th>
                <th>Form 137</th>
                <th>Cert of Honors</th>
                <th>Parents Voters</th>
                <th>Applicant Voters</th>
                <th>Birth Cert</th> --}}
                <th>Status</th>
                <th>Show</th>
                {{-- <th>Edit</th>
                <th>Actions</th> --}}
        

              </tr>
              </thead>
             
              <tfoot>
                <tbody>
                  @foreach ( $appli as $applis )
                    <tr>
                      <td>{{ $applis->application_transaction_id}}</td>
                      <td>{{ $applis->fname}} {{ $applis->lname}}</td>
                      <td>{{ $applis->school_name}}</td>
                      <td>{{ $applis->year_level}}</td>
                      <td>{{ $applis->application_status}}</td>
                      <td>{{ $applis->syear_semester}} </td>
                      <td>{{ $applis->scho_name}} </td>
                      {{-- <td><a href="{{ url('/viewcor', $applis->application_transaction_id) }}">View</a> </td>
                      <td><a href="{{ url('/viewgrades', $applis->application_transaction_id) }}">View</a> </td>
                      <td><a href="{{ url('/viewjuniorrecords', $applis->application_transaction_id) }}">View</a> </td>
                      <td><a href="{{ url('/viewseniorrecords', $applis->application_transaction_id) }}">View</a> </td>
                      <td><a href="{{ url('/viewvalidID', $applis->application_transaction_id) }}">View</a> </td>
                      <td><a href="{{ url('/viewform137', $applis->application_transaction_id) }}">View</a> </td>
                      <td><a href="{{ url('/viewcerthonors', $applis->application_transaction_id) }}">View</a> </td>
                      <td><a href="{{ url('/viewparentvoters', $applis->application_transaction_id) }}">View</a> </td>
                      <td><a href="{{ url('/viewapplicantvoters', $applis->application_transaction_id) }}">View</a> </td>
                      <td><a href="{{ url('/viewbirthcert', $applis->application_transaction_id) }}">View</a> </td> --}}
                      <td>{{ $applis->status}}</td>
                      <td>  <a href="#showapplication{{$applis->application_transaction_id}}" class="badge badge-pill badge-primary" data-toggle="modal"  >Show</a>
                     </td>
                     @include('transaction.showdetails')
                      {{-- <td>{{ $acadyear->description}}</td>
                      
                    
                      <td align="center">
                        @if (!$acadyear->deleted_at)
                        <a href="#editAcademicYear{{$acadyear->acadyears_id}}" class="badge badge-pill badge-primary" data-toggle="modal"  >Edit</a>
                       
                        @else
                        <a class="badge badge-pill badge-secondary">Edit</a> <br>
                        @endif
                      </td>
                      
                      @include('academicyear.edit')  
                      <td align="center">
                        @if(!$acadyear->deleted_at)
                        <a class="badge badge-pill badge-secondary">Restore</a> <br>
                        {!! Form::open(array('route' => array('academicyear.destroy', $acadyear->acadyears_id),'method'=>'DELETE')) !!}
                        <button class="badge badge-pill badge-danger">Delete </button>
                        {!! Form::close() !!}
                        @else
                        <a href="{{ route('academicyear.restore',$acadyear->acadyears_id) }}"class="badge badge-pill badge-warning" >Restore</a> <br>
                        <a class="badge badge-pill badge-secondary">Delete</a>
                        @endif
                      </td> --}}
                     

                     
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