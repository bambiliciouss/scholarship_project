  <!-- Modal -->
  <div class="modal fade bd-example-modal-lg" id="editApplicationPeriod{{$appliperiod->applicationPeriod_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Application Period Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <div class="modal-body">
                {{ Form::model($appliperiod,['route' => ['applicationperiod.update',$appliperiod->applicationPeriod_id],'method'=>'PUT','enctype' =>'multipart/form-data']) }}                         
                
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="category"> School Year </label>
                                  {!! Form::select('acadyears_id', App\Models\AcademicYear::pluck('description','acadyears_id'), null,['placeholder' => '--Please select--','class' => 'form-control']) !!}
                              </div>

                              <div class="form-group">
                                <label for="Name">Semester</label>
                                  <select id="semester" name="semester" class="form-control">
                                    <option value="First Semester" {{ $appliperiod->semester == 'First Semester' ? 'selected' : '' }}>First Semester</option>
                                    <option value="Second Semester" {{ $appliperiod->semester == 'Second Semester' ? 'selected' : '' }}>Second Semester</option>  
                                  </select>   
                                </div>
                          

                                  <div class="form-group">
                                    <label for="start_application">Start of Application</label>
                                    {{ Form::date('start_application',null,array('class'=>'form-control','id'=>'start_application')) }}
                                </div>

                                <div class="form-group">
                                    <label for="end_application">End of Application</label>
                                    {{ Form::date('end_application',null,array('class'=>'form-control','id'=>'end_application')) }}
                                </div>

                                <div class="form-group">
                                    <label for="scholarship_expiration">Scholarship Expiration</label>
                                    {{ Form::date('scholarship_expiration',null,array('class'=>'form-control','id'=>'scholarship_expiration')) }}
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
