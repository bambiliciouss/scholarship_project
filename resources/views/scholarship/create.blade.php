
  <!-- Modal -->
  <div class="modal fade bd-example-modal-lg" id="createScholarship" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <div class="modal-body">
              <form method="post" action="{{route('scholarship.store')}}" enctype="multipart/form-data" >
                <input type="hidden" name="_token" value="{{ csrf_token() }}"> 

           
              <div class="form-group">
                <label for="sname">Scholarship Name</label>
                <input type="text" id="sname" name="sname" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="description">Scholarship Description</label>
                <textarea id="description" name="description" class="form-control" rows="4" required></textarea>
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