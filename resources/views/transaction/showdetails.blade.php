  <!-- Modal -->
  <div class="modal fade bd-example-modal-lg" id="showapplication{{$applis->application_transaction_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Application Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <div class="modal-body">
                {{-- {{ Form::model($acadyear,['route' => ['academicyear.update',$acadyear->acadyears_id],'method'=>'PUT','enctype' =>'multipart/form-data']) }}                          --}}
                
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label > Name</label>
                                <input type="text" class="form-control" value="{{ $applis->fname}} {{ $applis->lname}}" readonly>
                            </div>

                            <div class="form-group">
                                <label > School Name</label>
                                <input type="text" class="form-control" value="{{  $applis->school_name}}" readonly>
                            </div>

                            <div class="form-group">
                                <label > School Name</label>
                                <input type="text" class="form-control" value="{{  $applis->year_level}}" readonly>
                            </div>
                            
                            <div class="form-group">
                                <label > Application Status</label>
                                <input type="text" class="form-control" value="{{ $applis->application_status}}" readonly>
                            </div>

                            <div class="form-group">
                                <label > Application Period</label>
                                <input type="text" class="form-control" value="{{ $applis->syear_semester}}" readonly>
                            </div>

                            <div class="form-group">
                                <label > Scholaship</label>
                                <input type="text" class="form-control" value="{{ $applis->scho_name}}" readonly>
                            </div>

                            <div class="form-group">
                                <label> Enrollment Form</label>
                                @if ($applis->enrollment_form=="no file")
                                <a href="#" class="badge badge-danger">No File</a>
                                @else
                                <a href="{{ url('/viewcor', $applis->application_transaction_id) }}" class="badge badge-info" target="_blank" >View File </a> 
                                @endif
                            </div>

                            <div class="form-group">
                                <label> Copy of Grades</label>
                                @if ($applis->grades_copy=="no file")
                                <a href="#" class="badge badge-danger">No File</a>
                                @else
                                <a href="{{ url('/viewgrades', $applis->application_transaction_id) }}" class="badge badge-info" target="_blank" >View File </a> 
                                @endif
                            </div>

                            <div class="form-group">
                                <label> Junior High Record</label>
                                @if ($applis->junior_record=="no file")
                                <a href="#" class="badge badge-danger">No File</a>
                                @else
                                <a href="{{ url('/viewjuniorrecords', $applis->application_transaction_id) }}" class="badge badge-info" target="_blank" >View File </a> 
                                @endif   
                            </div>

                            <div class="form-group">
                                <label> Senior High Record</label>
                                @if ($applis->senior_record=="no file")
                                <a href="#" class="badge badge-danger">No File</a>
                                @else
                                <a href="{{ url('/viewseniorrecords', $applis->application_transaction_id)  }}" class="badge badge-info" target="_blank" >View File </a> 
                                @endif   
                            </div>

                            <div class="form-group">
                                <label>Valid ID</label>
                                @if ($applis->validID=="no file")
                                <a href="#" class="badge badge-danger">No File</a>
                                @else
                                <a href="{{ url('/viewvalidID', $applis->application_transaction_id)}}" class="badge badge-info" target="_blank" >View File </a> 
                                @endif   
                            </div>

                            <div class="form-group">
                                <label>Form 137</label>
                                @if ($applis->form_137=="no file")
                                <a href="#" class="badge badge-danger">No File</a>
                                @else
                                <a href="{{ url('/viewform137', $applis->application_transaction_id)}}" class="badge badge-info" target="_blank" >View File </a> 
                                @endif   
                            </div>

                            <div class="form-group">
                                <label>Certificate of Honors</label>
                                @if ($applis->cert_honors=="no file")
                                <a href="#" class="badge badge-danger">No File</a>
                                @else
                                <a href="{{ url('/viewcerthonors', $applis->application_transaction_id)}}" class="badge badge-info" target="_blank" >View File </a> 
                                @endif   
                            </div>

                            <div class="form-group">
                                <label>Parent's Voter Certificate</label>
                                @if ($applis->voterscert_parent=="no file")
                                <a href="#" class="badge badge-danger">No File</a>
                                @else
                                <a href="{{ url('/viewparentvoters', $applis->application_transaction_id)}}" class="badge badge-info" target="_blank" >View File </a> 
                                @endif   
                            </div>

                            <div class="form-group">
                                <label>Applicant's Voter Certificate</label>
                                @if ($applis->votercert_applicant=="no file")
                                <a href="#" class="badge badge-danger">No File</a>
                                @else
                                <a href="{{ url('/viewapplicantvoters', $applis->application_transaction_id)}}" class="badge badge-info" target="_blank" >View File </a> 
                                @endif   
                            </div>

                            <div class="form-group">
                                <label>Birth Certificate</label>
                                @if ($applis->birthcert=="no file")
                                <a href="#" class="badge badge-danger">No File</a>
                                @else
                                <a href="{{  url('/viewbirthcert', $applis->application_transaction_id)}}" class="badge badge-info" target="_blank" >View File </a> 
                                @endif   
                            </div>



                        </div>
                    </div>
                </div><!-- /.modal-body -->
            </div><!-- /.modal-content -->
        
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      
        </div>
    </div><!-- /.modal-dialog -->
</div>
{{-- {!! Form::close() !!}  --}}
