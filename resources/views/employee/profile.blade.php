@extends('layouts.master')
@section('title', ' Employee Profile')
@section('content')
<section class="content">
        <div class="container-fluid">
          <br><br>
      @foreach($employee->chunk(4) as $employees)
      @foreach($employees as $empdisplay )
      
          <div class="row">
            <div class="col-md-3"></div>

            <div class="col-md-6">
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Employee Profile</h3>
                </div>
                
                <div class="card-body box-profile">
                  <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle" src="{{ asset('images/'.$empdisplay->img_path) }}" alt="User profile picture">
                  </div>
                  
                  <h3 class="profile-username text-center">{{ $empdisplay->fname}} {{ $empdisplay->lname}} </h3>
                  
                  <p class="text-muted text-center">{{ $empdisplay->user->email}}</p>
                  
                  <div class="card-body">
                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Address</strong>
                    <p class="text-muted"> {{ $empdisplay->addressline}} {{ $empdisplay->town}} {{ $empdisplay->zipcode }} </p>
                    
                    <hr>
                    
                    <div class="row">
                      
                      
                      <div class="col-sm-4">
                        <strong><i class="fas fa-phone-square"></i> Phone No.</strong>
                        <p class="text-muted">{{ $empdisplay->phone}} </p>
                      </div>

                      
                    </div>
                    
                    <hr>
                    
                   
                  

                      {{-- <a href="{{route('user.edit',$userdisplay->student_id)}}" class="btn btn-default float-right">Edit Profile</a> --}}
                      
                      {{-- <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
                        Edit Profile
                      </button> --}}
                      
                    <a href="#editemp{{$empdisplay->employee_id}}" class="btn btn-primary float-right" data-toggle="modal"  >Edit</a>
                    @include('employee.edit')
                  
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