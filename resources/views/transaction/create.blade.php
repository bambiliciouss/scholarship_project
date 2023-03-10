@extends('layouts.master')
@section('title', ' Application')
@section('content')
<section class="content">
    <br> 
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-sm-2"></div>
            <!-- left column -->
            <div class="col-sm-8">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Application Form</h3>
                    </div><!-- /.card-header -->

                    <!-- form start -->
                    
                    <form method="post" action="{{route('transaction.store')}}" enctype="multipart/form-data" >
                       
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">                            

                        <div class="card-body">
                            

                            <div class="row">
                               
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="lname">School Name</label>
                                        <input type="text" class="form-control" id="school_name" name="school_name" placeholder="Enter school name" required>
                                    </div>

                                    

                                    <div class="form-group">
                                        <label for="year_level">Year Level</label>
                                        <select id="year_level" class="form-control "name="year_level" >
                                            <option value="0" selected="selected" disabled>--Select your Year Level--</option>
                                            <option value="First Year">First Year</option>
                                            <option value="Second Year">Second Year</option>
                                            <option value="Third Year">Third Year</option>
                                            <option value="Fourth Year">Fourth Year</option>
                                          </select>
                                     
                                    </div>

                                    <div class="form-group">
                                        <label for="application_status">Application Status</label>
                                        <select id="application_status" class="form-control "name="application_status" >
                                            <option value="0" selected="selected" disabled>--Select your Year Level--</option>
                                            <option value="New">New</option>
                                            <option value="Renewing">Renewing</option>
                                            
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
                                                <option value="{{ $id }}">{{ $description }}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <label class="form-control-label">Enrolment Form/Registration Form</label>
                                         <input type="file" class="form-control" id="docs_enrollmentform" name="docs_enrollmentform" >
                                         
                                    </div>
                            

                      
                                    <div class="form-group">
                                        <label class="form-control-label">Copy of Grades</label>
                                         <input type="file" class="form-control" id="docs_grades_copy" name="docs_grades_copy" >
                                         
                                    </div>

                                    <div class="form-group">
                                        <label class="form-control-label">Junior High School Diploma</label>
                                         <input type="file" class="form-control" id="docs_junior_record" name="docs_junior_record" >
                                         
                                    </div>

                                    <div class="form-group">
                                        <label class="form-control-label">Senior High School Diploma</label>
                                         <input type="file" class="form-control" id="docs_senior_record" name="docs_senior_record" >
                                         
                                    </div>

                                    <div class="form-group">
                                        <label class="form-control-label">School ID / Valid ID</label>
                                         <input type="file" class="form-control" id="docs_validID" name="docs_validID" >
                                         
                                    </div>

                                    <div class="form-group">
                                        <label class="form-control-label">Form 137</label>
                                         <input type="file" class="form-control" id="docs_form_137" name="docs_form_137" >
                                         
                                    </div>

                                    <div class="form-group">
                                        <label class="form-control-label">Certificate of Academic Excellence for TOP 10 Graduates</label>
                                         <input type="file" class="form-control" id="docs_cert_honors" name="docs_cert_honors" >
                                         
                                    </div>

                                    <div class="form-group">
                                        <label class="form-control-label">One of the parent Taguig Voter Certificate</label>
                                         <input type="file" class="form-control" id="docs_votercert_parent" name="docs_votercert_parent" >
                                         
                                    </div>

                                    <div class="form-group">
                                        <label class="form-control-label">Applicant Taguig Voter Cetificate</label>
                                         <input type="file" class="form-control" id="docs_votercert_applicant" name="docs_votercert_applicant" >
                                         
                                    </div>

                                    <div class="form-group">
                                        <label class="form-control-label">Birth Certificate</label>
                                         <input type="file" class="form-control" id="docs_birthcert" name="docs_birthcert" >
                                         
                                    </div>
                        
                            </div>

                             </div>
                        </div>
                        <!-- /.card-body -->                
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit Application</button>
                            <a href="{{url()->previous()}}" class="btn btn-default float-right">Cancel</a>
                        </div>
                    </form>
                </div><!-- /.card -->
            </div><!--/.col (right) -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</section>



@include('layouts.foot')

@endsection