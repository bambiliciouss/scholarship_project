  <!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="exampleModal{{$userdisplay->student_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <div class="modal-body">
                {{ Form::model($userdisplay,['route' => ['user.update',$userdisplay->student_id],'method'=>'PUT','enctype' =>'multipart/form-data']) }}                         
                
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="lname">Last Name</label>
                                {{ Form::text('lname',null,array('class'=>'form-control','id'=>'lname')) }}
                            </div>
                        </div>
                        
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="fname">First Name</label>
                                {{ Form::text('fname',null,array('class'=>'form-control','id'=>'fname')) }}
                            </div>
                        </div>
                        
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="midname">Middle Name</label>
                                {{ Form::text('midname',null,array('class'=>'form-control','id'=>'midname')) }}
                            </div>
                        </div>
                    </div>
  
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="form-group">
                                <label for="addressline">Addressline</label>
                                {{ Form::text('addressline',null,array('class'=>'form-control','id'=>'addressline')) }}
                            </div>
                        </div>
                        
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="barangay">Barangay</label>
                                {{ Form::text('barangay',null,array('class'=>'form-control','id'=>'barangay')) }}
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="age">Age</label>
                                {{ Form::number('age',null,array('class'=>'form-control','id'=>'age')) }}
                            </div>
                        </div>
                        
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="gender">Gender</label>
                                {{ Form::text('gender',null,array('class'=>'form-control','id'=>'gender')) }}
                            </div>
                        </div>
                        
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                {{ Form::text('phone',null,array('class'=>'form-control','id'=>'phone')) }}
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="religion">Religion</label>
                                {{ Form::text('religion',null,array('class'=>'form-control','id'=>'religion')) }}
                            </div>
                        </div>
                    </div>
  
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                               <label for="place_of_birth">Place of Birth</label>
                                {{ Form::text('place_of_birth',null,array('class'=>'form-control','id'=>'place_of_birth')) }}
                            </div>
                        </div>

                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="date_of_birth">Date of Birth</label>
                                {{ Form::date('date_of_birth',null,array('class'=>'form-control','id'=>'date_of_birth')) }}
                            </div>
                        </div>

                        <div class="col-sm-2">
                            <div class="form-group">
                                <label class="form-control-label">Student Photo</label>
                                
                                <img width ='100px' height='100px' src="{{ asset('images/'.$userdisplay->img_path) }}"enctype="multipart/form-data" />
                            </div>
                        </div>
                        
                        <div class="col-sm-4">
                            <div class="form-group">
                                <br><br><br><br>
                                <input type="file" class="form-control" id="image" name="image" >
                                
                            </div>
                        </div>
                    </div>
  
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value=" {{ $userdisplay->user->email}}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" value=" {{ $userdisplay->user->password}}">
                        </div>
                    </div>
                </div>
  
                <div class="form-group">
                    <label for="father_name">Father's Name</label>
                    {{ Form::text('father_name',null,array('class'=>'form-control','id'=>'father_name')) }}
                </div>
  
                <div class="form-group">
                    <label for="mother_name">Mother's Name</label>
                    {{ Form::text('mother_name',null,array('class'=>'form-control','id'=>'mother_name')) }}
                </div>
            </div><!-- /.modal-body -->
        </div><!-- /.modal-content -->
        
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </div><!-- /.modal-dialog -->
</div>
{!! Form::close() !!} 
