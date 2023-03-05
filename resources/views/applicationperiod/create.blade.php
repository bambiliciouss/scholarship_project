
  <!-- Modal -->
  <div class="modal fade bd-example-modal-lg" id="createApplicationPeriod" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Application Period</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <div class="modal-body">
              <form method="post" action="{{route('applicationperiod.store')}}" enctype="multipart/form-data" >
             
                <input type="hidden" name="_token" value="{{ csrf_token() }}"> 

                <div class="form-group">
                    <label for="category"> School Year </label>
                      {!! Form::select('acadyears_id', App\Models\AcademicYear::pluck('description','acadyears_id'), null,['placeholder' => '--Please select--','class' => 'form-control']) !!}
                  </div>

                
                  <div class="form-group">
                    <label for="Name">Semester</label>

                    <select id="semester" class="form-control " name="semester" >
                        <option value="0" selected="selected" disabled>--Select Semester--</option>
                        <option value="First Semester">First Semester</option>
                        <option value="Second Semester">Second Semester</option>
            
                      </select>
            
                </div>

           
              <div class="form-group">
                <label for="start_application">Start of Application</label>
                <input type="date" class="form-control" id="start_application" name="start_application" placeholder="Enter start of application" required>
              </div>

              <div class="form-group">
                <label for="end_application">End of Application</label>
                <input type="date" class="form-control" id="end_application" name="end_application" placeholder="Enter end of application" required>
              </div>

              <div class="form-group">
                <label for="scholarship_expiration">Scholarship Expiration</label>
                <input type="date" class="form-control" id="scholarship_expiration" name="scholarship_expiration" placeholder="Enter scholarship expiration" required>
              </div>
        
          
      
        
            </div><!-- /.modal-body -->
       
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Create</button>
        </div>
     </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
</div>

    </form>

      
      
      {{-- @include('layouts.foot') --}}