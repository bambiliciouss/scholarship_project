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
                        {{ $userdisplay->barangay == 'Female' ? 'selected' : '' }}
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="barangay">Barangay</label>
                                <select id="barangay" class="form-control "name="barangay"  >
                                    <option value="0" selected="selected" disabled>--Select your Barangay--</option>
                                    <option value="Bagong Tanyag"  {{ $userdisplay->barangay == 'Bagong Tanyag' ? 'selected' : '' }}>Bagong Tanyag</option>
                                    <option value="Bagumbayan"  {{ $userdisplay->barangay == 'Bagumbayan' ? 'selected' : '' }}>Bagumbayan</option>
                                    <option value="Bambang"  {{ $userdisplay->barangay == 'Bambang' ? 'selected' : '' }}>Bambang</option>
                                    <option value="Calzada"  {{ $userdisplay->barangay == 'Calzada' ? 'selected' : '' }}>Calzada</option>
                                    <option value="Central Bicutan"  {{ $userdisplay->barangay == 'Central Bicutan' ? 'selected' : '' }}>Central Bicutan</option>
                                    <option value="Central Signal Village"  {{ $userdisplay->barangay == 'Central Signal Village' ? 'selected' : '' }}>Central Signal Village</option>
                                    <option value="Fort Bonifacio"  {{ $userdisplay->barangay == 'Fort Bonifacio' ? 'selected' : '' }}>Fort Bonifacio</option>
                                    <option value="Hagonoy"  {{ $userdisplay->barangay == 'Hagonoy' ? 'selected' : '' }}>Hagonoy</option>
                                    <option value="Ibayo Tipas"  {{ $userdisplay->barangay == 'Ibayo Tipas' ? 'selected' : '' }}>Ibayo Tipas</option>
                                    <option value="Katuparan" {{ $userdisplay->barangay == 'Katuparan' ? 'selected' : '' }}>Katuparan</option>
                                    <option value="Ligid Tipas"  {{ $userdisplay->barangay == 'Ligid Tipas' ? 'selected' : '' }}>Ligid Tipas</option>
                                    <option value="Lower Bicutan"  {{ $userdisplay->barangay == 'Lower Bicutan' ? 'selected' : '' }}>Lower Bicutan</option>
                                    <option value="Maharlika Village"  {{ $userdisplay->barangay == 'Maharlika Village' ? 'selected' : '' }}>Maharlika Village</option>
                                    <option value="Napindan"  {{ $userdisplay->barangay == 'Female' ? 'Napindan' : '' }}>Napindan</option>
                                    <option value="New Lower Bicutan"  {{ $userdisplay->barangay == 'New Lower Bicutan' ? 'selected' : '' }}>New Lower Bicutan</option>
                                    <option value="North Daang Hari"  {{ $userdisplay->barangay == 'North Daang Hari' ? 'selected' : '' }}>North Daang Hari</option>
                                    <option value="North Signal Village"  {{ $userdisplay->barangay == 'North Signal Village' ? 'selected' : '' }}>North Signal Village</option>
                                    <option value="Palingon"  {{ $userdisplay->barangay == 'Palingon' ? 'selected' : '' }}>Palingon</option>
                                    <option value="Pinagsama"  {{ $userdisplay->barangay == 'Pinagsama' ? 'selected' : '' }}>Pinagsama</option>
                                    <option value="San Miguel"  {{ $userdisplay->barangay == 'San Miguel' ? 'selected' : '' }}>San Miguel</option>
                                    <option value="Santa Ana"  {{ $userdisplay->barangay == 'Santa Ana' ? 'selected' : '' }}>Santa Ana</option>
                                    <option value="South Daang Hari"  {{ $userdisplay->barangay == 'South Daang Hari' ? 'selected' : '' }}>South Daang Hari</option>
                                    <option value="South Signal Village"  {{ $userdisplay->barangay == 'South Signal Village' ? 'selected' : '' }}>South Signal Village</option>
                                    <option value="Tuktukan"  {{ $userdisplay->barangay == 'Tuktukan' ? 'selected' : '' }}>Tuktukan</option>
                                    <option value="Upper Bicutan"  {{ $userdisplay->barangay == 'Upper Bicutan' ? 'selected' : '' }}>Upper Bicutan</option>
                                    <option value="Ususan"  {{ $userdisplay->barangay == 'Ususan' ? 'selected' : '' }}>Ususan</option>
                                    <option value="Wawa"  {{ $userdisplay->barangay == 'Wawa' ? 'selected' : '' }}>Wawa</option>
                                    <option value="Western Bicutan"  {{ $userdisplay->barangay == 'Western Bicutan' ? 'selected' : '' }}>Western Bicutan</option>
                                   
                                   

                                  </select>
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
                                <select id="gender" name="gender" class="form-control">
                                    <option value="Female" {{ $userdisplay->gender == 'Female' ? 'selected' : '' }}>Female</option>
                                    <option value="Male" {{ $userdisplay->gender == 'Male' ? 'selected' : '' }}>Male</option>  
                                  </select> 
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
