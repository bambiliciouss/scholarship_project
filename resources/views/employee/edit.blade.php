  <!-- Modal -->
  <div class="modal fade bd-example-modal-lg" id="editemp{{$empdisplay->employee_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <div class="modal-body">
                {{ Form::model($empdisplay,['route' => ['employee.update',$empdisplay->employee_id],'method'=>'PUT','enctype' =>'multipart/form-data']) }}                         
                
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="lname">Last Name</label>
                                {{ Form::text('lname',null,array('class'=>'form-control','id'=>'lname')) }}
                            </div>
                        </div>
                        
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="fname">First Name</label>
                                {{ Form::text('fname',null,array('class'=>'form-control','id'=>'fname')) }}
                            </div>
                        </div>
                        
                        
                    </div>
  
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="addressline">Addressline</label>
                                {{ Form::text('addressline',null,array('class'=>'form-control','id'=>'addressline')) }}
                            </div>
                        </div>
                        
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="town">Town</label>
                                {{ Form::text('town',null,array('class'=>'form-control','id'=>'town')) }}
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="zipcode">Zipcode</label>
                                {{ Form::number('zipcode',null,array('class'=>'form-control','id'=>'zipcode')) }}
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                      
                        
                       
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                {{ Form::text('phone',null,array('class'=>'form-control','id'=>'phone')) }}
                            </div>
                        </div>

                        <div class="col-sm-2">
                            <div class="form-group">
                                <label class="form-control-label">Student Photo</label>
                                
                                <img width ='100px' height='100px' src="{{ asset('images/'.$empdisplay->img_path) }}"enctype="multipart/form-data" />
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
                            <input type="email" class="form-control" id="email" name="email" value=" {{ $empdisplay->user->email}}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" value=" {{ $empdisplay->user->password}}">
                        </div>
                    </div>
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
