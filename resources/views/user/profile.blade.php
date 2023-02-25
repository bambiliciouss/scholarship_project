@extends('layouts.master')
@section('title', ' Student Profile')
@section('content')
<section class="content">
        <div class="container-fluid">
          <br><br>
      @foreach($student->chunk(4) as $students)
      @foreach($students as $userdisplay )
      
          <div class="row">
            <div class="col-md-3"></div>

            <div class="col-md-6">
              @if ($message = Session::get('success'))
              <div class="alert alert-light alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                <strong>{{ $message }}</strong>
              </div>
              @endif
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Student Profile</h3>
                </div>
                
                <div class="card-body box-profile">
                  <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle" src="{{ asset('images/'.$userdisplay->img_path) }}" alt="User profile picture">
                  </div>
                  
                  <h3 class="profile-username text-center">{{ $userdisplay->fname}} {{ $userdisplay->midname}} {{ $userdisplay->lname}} </h3>
                  
                  <p class="text-muted text-center">{{ $userdisplay->user->email}}</p>
                  
                  <div class="card-body">
                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Address</strong>
                    <p class="text-muted"> {{ $userdisplay->addressline}} {{ $userdisplay->barangay}} Taguig City </p>
                    
                    <hr>
                    
                    <div class="row">
                      <div class="col-sm-4">
                        <strong><i class="fa-regular fa-image-user"></i> Age</strong>
                        <p class="text-muted"> {{ $userdisplay->age}} years old </p>
                      </div>
                      
                      <div class="col-sm-4">
                        <strong><i class="fas fa-phone-square"></i> Phone No.</strong>
                        <p class="text-muted">{{ $userdisplay->phone}} </p>
                      </div>

                      <div class="col-sm-4">
                        <strong><i class="fas fa-church"></i> Religion</strong>
                        <p class="text-muted">{{ $userdisplay->religion}} </p> 
                      </div>
                    </div>
                    
                    <hr>
                    
                    <div class="row">
                      <div class="col-sm-4">
                        <strong><i class="fas fa-calendar-week"></i> Date of Birth</strong>
                        <p class="text-muted"> {{ $userdisplay->date_of_birth}} </p>
                      </div>
                      
                      <div class="col-sm-4">
                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Place of Birth</strong>
                        <p class="text-muted">{{ $userdisplay->place_of_birth}} </p> 
                      </div> 
                    </div>

                    <hr>
                    
                    <strong><i class="fas fa-user"></i> Father's Name</strong>
                    <p class="text-muted"> {{ $userdisplay->father_name}} </p>
                    <hr>
                    
                    <strong><i class="fas fa-user"></i> Mother's Name</strong>
                    <p class="text-muted"> {{ $userdisplay->mother_name}} </p>
                    <hr>

                      {{-- <a href="{{route('user.edit',$userdisplay->student_id)}}" class="btn btn-default float-right">Edit Profile</a> --}}
                      
                      {{-- <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
                        Edit Profile
                      </button> --}}
                      
                    <a href="#exampleModal{{$userdisplay->student_id}}" class="btn btn-primary float-right" data-toggle="modal"  >Edit</a>
                    @include('user.edit')
                  
                  </div><!-- /.card-body -->
                </div><!-- /.box profile-->
              </div><!-- /.card primary-->
            </div>
          </div>
        </div>
      
      
      @endforeach
      @endforeach
      
      @include('layouts.foot')

</section>
@endsection