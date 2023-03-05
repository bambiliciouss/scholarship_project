  <!-- Modal -->
  <div class="modal fade bd-example-modal-lg" id="editAcademicYear{{$acadyear->acadyears_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Academic Year Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <div class="modal-body">
                {{ Form::model($acadyear,['route' => ['academicyear.update',$acadyear->acadyears_id],'method'=>'PUT','enctype' =>'multipart/form-data']) }}                         
                
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="lname">Scholarship Name</label>
                                {{ Form::text('description',null,array('class'=>'form-control','id'=>'description')) }}
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
