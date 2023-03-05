
  <!-- Modal -->
  <div class="modal fade bd-example-modal-lg" id="createAcademicYear" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Academic Year</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <div class="modal-body">
              <form method="post" action="{{route('academicyear.store')}}" enctype="multipart/form-data" >
                <input type="hidden" name="_token" value="{{ csrf_token() }}"> 

           
              <div class="form-group">
                <label for="description">School Year</label>
                <input type="text" id="description" name="description" class="form-control" required>
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