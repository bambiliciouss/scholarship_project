  <!-- Modal -->
  <div class="modal fade bd-example-modal-lg" id="editapplication{{$dataviews->application_transaction_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Application Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <div class="modal-body">
                {{ Form::model($dataviews,['route' => ['transaction.update',$dataviews->application_transaction_id],'method'=>'PUT','enctype' =>'multipart/form-data']) }}                         
                
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="school_name">School Name</label>
                                {{ Form::text('school_name',null,array('class'=>'form-control','id'=>'school_name')) }}
                            </div>

                            

                            <div class="form-group">
                                <label for="year_level">Year Level</label>
                                <select id="year_level" class="form-control "name="year_level" >
                                    <option value="First Year" {{ $dataviews->year_level == 'First Year' ? 'selected' : '' }}>First Year</option>
                                    <option value="Second Year" {{ $dataviews->year_level == 'Second Year' ? 'selected' : '' }}>Second Year</option>
                                    <option value="Third Year" {{ $dataviews->year_level == 'Third Year' ? 'selected' : '' }}>Third Year</option>
                                    <option value="Fourth Year" {{ $dataviews->year_level == 'Fourth Year' ? 'selected' : '' }}>Fourth Year</option>
                                  </select>

                              
                             
                            </div>

                            <div class="form-group">
                                <label for="application_status">Application Status</label>
                                <select id="application_status" class="form-control "name="application_status" >
                                    <option value="New" {{ $dataviews->application_status == 'New' ? 'selected' : '' }} >New</option>
                                    <option value="Renewing" {{ $dataviews->application_status == 'Renewing' ? 'selected' : '' }}>Renewing</option>
                                    
                                  </select>
                            </div>


                            <div class="form-group">
                                <label for="scholarship"> Type of Scholarship</label>
                                  {!! Form::select('scholarship_id', App\Models\Scholarshipinfo::pluck('sname','scholarship_id'), null,['placeholder' => '--Please select--','class' => 'form-control']) !!}
                            </div>

                            <div class="form-group">
                                <label for="school_year">School Year</label>
                                <select class="form-control" id="school_year" name="school_year">
                                    <option value="0" selected="selected" disabled>--Please Select--</option>
                                    @foreach($appliperiod as $id => $description)
                                        <option value="{{ $id }}"{{ $dataviews->applicationPeriod_id ==  $id ? 'selected' : '' }} >{{ $description }}</option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="form-group">
                                <label class="form-control-label">Enrolment Form/Registration Form</label>
                                 <input type="file" class="form-control" id="docs_enrollmentform" name="docs_enrollmentform" value="{{ $dataviews->enrollment_form }}" >
                               
                                 
                            </div>
                    

              
                            <div class="form-group">
                                <label class="form-control-label">Copy of Grades</label>
                                 <input type="file" class="form-control" id="docs_grades_copy" name="docs_grades_copy" value="{{ $dataviews->grades_copy }}">
                                 
                            </div>

                            <div class="form-group">
                                <label class="form-control-label">Junior High School Diploma</label>
                                 <input type="file" class="form-control" id="docs_junior_record" name="docs_junior_record" value="{{ $dataviews->junior_record }}">
                                 
                            </div>

                            <div class="form-group">
                                <label class="form-control-label">Senior High School Diploma</label>
                                 <input type="file" class="form-control" id="docs_senior_record" name="docs_senior_record" value="{{ $dataviews->senior_record }}">
                                 
                            </div>

                            <div class="form-group">
                                <label class="form-control-label">School ID / Valid ID</label>
                                 <input type="file" class="form-control" id="docs_validID" name="docs_validID" value="{{ $dataviews->validID }}">
                                 
                            </div>

                            <div class="form-group">
                                <label class="form-control-label">Form 137</label>
                                 <input type="file" class="form-control" id="docs_form_137" name="docs_form_137" value="{{ $dataviews->form_137 }}">
                                 
                            </div>

                            <div class="form-group">
                                <label class="form-control-label">Certificate of Academic Excellence for TOP 10 Graduates</label>
                                 <input type="file" class="form-control" id="docs_cert_honors" name="docs_cert_honors" value="{{ $dataviews->cert_honors }}">
                                 
                            </div>

                            <div class="form-group">
                                <label class="form-control-label">One of the parent Taguig Voter Certificate</label>
                                 <input type="file" class="form-control" id="docs_votercert_parent" name="docs_votercert_parent" value="{{ $dataviews->voterscert_parent }}">
                                 
                            </div>

                            <div class="form-group">
                                <label class="form-control-label">Applicant Taguig Voter Cetificate</label>
                                 <input type="file" class="form-control" id="docs_votercert_applicant" name="docs_votercert_applicant" value="{{ $dataviews->votercert_applicant }}">
                                 
                            </div>

                            <div class="form-group">
                                <label class="form-control-label">Birth Certificate</label>
                                 <input type="file" class="form-control" id="docs_birthcert" name="docs_birthcert" value="{{ $dataviews->birthcert }}">
                                 
                            </div>



                        </div>
                    </div>
                </div><!-- /.modal-body -->
            </div><!-- /.modal-content -->
        
        <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Update</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      
        </div>
    </div><!-- /.modal-dialog -->
</div>
{!! Form::close() !!} 
