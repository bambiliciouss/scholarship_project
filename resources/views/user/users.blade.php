@extends('layouts.master')
@section('title', ' List of Students')
@section('content')
<section class="content">
  <div class="container-fluid">

    <br><br>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">List of Students Account</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th>Student Id</th>
                <th>Profile</th>
                <th>Name</th>
                <th>Addressline</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Religion</th>
                <th>Date of Birth</th>
                <th>Place of Birth</th>
                <th>Father's Name</th>
                <th>Mother's Name</th>
                <th>Actions</th>
        

              </tr>
              </thead>
             
              <tfoot>
                <tbody>
                  @foreach ( $students as $student )
                    <tr>
                      <td>{{ $student->student_id}}</td>
                      <td><img src="{{ asset('images/'.$student->img_path) }}" alt="Product 1" class="img-circle img-size-32 mr-2"></td>
                      <td>{{ $student->lname}}, {{ $student->fname}} {{ $student->midname}}</td>
                      <td>{{ $student->addressline}} {{ $student->barangay}}</td>
                      <td>{{ $student->age}}</td>
                      <td>{{ $student->gender}}</td>
                      <td>{{ $student->phone}}</td>
                      <td>{{ $student->user->email}}</td>
                      <td>{{ $student->religion}}</td>
                      <td>{{ $student->date_of_birth}}</td>
                      <td>{{ $student->place_of_birth}}</td>
                      <td>{{ $student->father_name}}</td>
                      <td>{{ $student->mother_name}}</td>

                      <td align="center">
                        @if(!$student->deleted_at)
                        <a class="badge badge-pill badge-secondary">Activate</a> <br>
                        {!! Form::open(array('route' => array('user.destroy', $student->student_id),'method'=>'DELETE')) !!}
                        <button class="badge badge-pill badge-danger">Deactivate </button>
                        {!! Form::close() !!}
                        @else
                        <a href="{{ route('user.restore',$student->student_id) }}"class="badge badge-pill badge-warning" >Activate</a> <br>
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
@include('layouts.message')
</section>
@endsection