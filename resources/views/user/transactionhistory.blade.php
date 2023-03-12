@extends('layouts.master')
@section('title', 'Applications')
@section('content')
<section class="content">
  
  <div class="container-fluid">

    <br><br>
    <div class="row">
      <div class="col-12">
          @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-block">
              <button type="button" class="close" data-dismiss="alert">×</button> 
              <strong>{{ $message }}</strong>
            </div>
            @endif
            
            @if ($message = Session::get('success'))
            <div class="alert alert-light alert-block">
              <button type="button" class="close" data-dismiss="alert">×</button> 
              <strong>{{ $message }}</strong>
            </div>
            @endif
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Application History</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-hover">
                
               
              <thead>
                
              <tr>
                <th>Actions</th>
                <th>Transaction ID</th>
                <th>School Name</th>
                <th>Year Level</th>
                <th>Application Status</th>
                <th>Application Period</th>
                <th>Scholarship</th>
                <th>Enrolment Form</th>
                <th>Grades</th>
                <th>Junior Record</th>
                <th>Senior Record</th>
                <th>Valid ID</th>
                <th>Form 137</th>
                <th>Cert of Honors</th>
                <th>Parents Voters</th>
                <th>Applicant Voters</th>
                <th>Birth Cert</th>
                <th>Status</th>
                
                {{-- <th>Show</th> --}}
                {{-- <th>Edit</th>
                <th>Actions</th> --}}
        

              </tr>
              </thead>
             
              <tfoot>
                <tbody>
                  @foreach ( $dataview as $dataviews )
                    <tr>
                      <td>
                        @if ($dataviews->expiration < now()) 
                            <a href="#" class="badge badge-pill badge-secondary" disabled>Edit</a>
                        @else
                        <a href="#editapplication{{$dataviews->application_transaction_id}}" class="badge badge-pill badge-primary" data-toggle="modal"  >Edit</a>
                        @endif

                        @if(!$dataviews->deleted_at)
                        <a class="badge badge-pill badge-secondary">Restore</a> <br>
                        {!! Form::open(array('route' => array('application.destroy', $dataviews->application_transaction_id),'method'=>'DELETE')) !!}
                        <button class="badge badge-pill badge-danger">Delete </button>
                        {!! Form::close() !!}
                        @else
                        <a href="{{ route('application.restore',$dataviews->application_transaction_id) }}"class="badge badge-pill badge-warning" >Restore</a> <br>
                        <a class="badge badge-pill badge-secondary">Delete</a>
                        @endif

                    </td>
                    @include('transaction.edit')
                      <td>{{ $dataviews->application_transaction_id}}</td>
                      <td>{{ $dataviews->school_name}}</td>
                      <td>{{ $dataviews->year_level}}</td>
                      <td>{{ $dataviews->application_status}}</td>
                      <td>{{ $dataviews->syear_semester}} </td>
                      <td>{{ $dataviews->scho_name}} </td>
                      <td>
                        @if ($dataviews->enrollment_form=="no file")
                        <span style="color: red;">No File</span>
                        @else
                        <a href="{{ url('/viewcor', $dataviews->application_transaction_id) }}">View</a> 
                        @endif
                      </td>
                      <td>
                        @if ($dataviews->grades_copy=="no file")
                        <span style="color: red;">No File</span>
                        @else
                        <a href="{{ url('/viewgrades', $dataviews->application_transaction_id) }}">View</a> 
                        @endif
                      </td>
                      <td>
                        @if ($dataviews->junior_record=="no file")
                        <span style="color: red;">No File</span>
                        @else
                        <a href="{{ url('/viewjuniorrecords', $dataviews->application_transaction_id) }}">View</a> 
                        @endif
                      </td>
                      <td>
                        @if ($dataviews->senior_record=="no file")
                        <span style="color: red;">No File</span>
                        @else
                        <a href="{{ url('/viewseniorrecords', $dataviews->application_transaction_id) }}">View</a>
                        @endif
                      </td>
                      <td>
                        @if ($dataviews->validID=="no file")
                        <span style="color: red;">No File</span>
                        @else
                        <a href="{{ url('/viewvalidID', $dataviews->application_transaction_id) }}">View</a> 
                        @endif
                      </td>
                      <td>
                        @if ($dataviews->form_137=="no file")
                        <span style="color: red;">No File</span>
                        @else
                        <a href="{{ url('/viewform137', $dataviews->application_transaction_id) }}">View</a>
                        @endif
                      </td>
                      <td>
                        @if ($dataviews->cert_honors=="no file")
                        <span style="color: red;">No File</span>
                        @else
                        <a href="{{ url('/viewcerthonors', $dataviews->application_transaction_id) }}">View</a>
                        @endif
                      </td>
                      <td>
                        @if ($dataviews->voterscert_parent=="no file")
                        <span style="color: red;">No File</span>
                        @else
                        <a href="{{ url('/viewparentvoters', $dataviews->application_transaction_id) }}">View</a>
                        @endif
                      </td>
                      <td>
                        @if ($dataviews->votercert_applicant=="no file")
                        <span style="color: red;">No File</span>
                        @else
                        <a href="{{ url('/viewapplicantvoters', $dataviews->application_transaction_id) }}">View</a> 
                        @endif
                      </td>
                      <td>
                        @if ($dataviews->birthcert=="no file")
                        <span style="color: red;">No File</span>
                        @else
                        <a href="{{ url('/viewbirthcert', $dataviews->application_transaction_id) }}">View</a>
                        @endif
                      </td>
                      <td>{{ $dataviews->status}}</td>
                      {{-- <td>   <a href="#showapplication{{$applis->application_transaction_id}}" class="badge badge-pill badge-primary" data-toggle="modal"  >Show</a>
                     </td>
                     @include('transaction.showdetails') --}}
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