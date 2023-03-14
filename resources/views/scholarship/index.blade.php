@extends('layouts.master')
@section('title', ' LANI Scholarship')
@section('content')
<div class="content">
  {{-- @if ($message = Session::get('error'))
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
@endif --}}
  <br><br>
  @foreach($scho->chunk(4) as $schos)
  <div class="container">
    <div class="row">
      @foreach ($schos as $scholar)
      
      <div class="col-lg-12">
        <div class="card card-primary card-outline">
          <div class="card-header">
           <h5 class="card-title m-0"> <b>{{$scholar->sname}}</b> </h5>
          </div>
          
          <div class="card-body">
            <h6 class="card-title">{{$scholar->description}}</h6>
            <br><br>
            <a href="#" class="btn btn-primary float-right">View Details</a>
          </div>
        </div>
      </div>
      <!-- /.col-md-12 -->
      
      @endforeach
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</div><!-- /.content -->
@endforeach

@include('layouts.foot')
@include('layouts.message')
@endsection