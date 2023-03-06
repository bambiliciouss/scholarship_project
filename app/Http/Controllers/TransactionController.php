<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Studentinfo;
use Auth;
use DB;
use View;
use Redirect;

class TransactionController extends Controller
{
    public function getcreate(){
        return view('transaction.create');
    }

    public function store(Request $request){
       
        try {
            DB::beginTransaction();
            $docs = new Transaction;

            $stud = Studentinfo::where('user_id',Auth::id())->first();
            $student = Studentinfo::where('user_id',$stud->user_id)->first()->student_id;

            //dd($student);
            

            $docs->student_id = $student;
            $docs->school_name = $request->school_name;
            $docs->year_level = $request->year_level;
            $docs->application_status = $request->application_status;
            $docs->applicationPeriod_id = 1;
            $docs->scholarship_id = $request->scholarship_id;


            $input = $request->enrollment_form;
            if($file = $request->hasFile('docs_enrollmentform')) {
                $file = $request->file('docs_enrollmentform') ;
                $fileName = date('M,d,Y').'_'.$file->getClientOriginalName();
                $destinationPath = public_path().'/EnrollmentForm';
                $input['enrollment_form'] = $fileName;
                $file->move($destinationPath,$fileName);
            }
            else {
                $input['enrollment_form'] = 'no file';
            }
            $docs->enrollment_form =  $input['enrollment_form'];

            $input = $request->grades_copy;
            if($file = $request->hasFile('docs_grades_copy')) {
                $file = $request->file('docs_grades_copy') ;
                $fileName = date('M,d,Y').'_'.$file->getClientOriginalName();
                $destinationPath = public_path().'/GradesCopies';
                $input['grades_copy'] = $fileName;
                $file->move($destinationPath,$fileName);
            }
            else {
                $input['grades_copy'] = 'no file';
            }
            $docs->grades_copy =  $input['grades_copy'];

            $input = $request->junior_record;
            if($file = $request->hasFile('docs_junior_record')) {
                $file = $request->file('docs_junior_record') ;
                $fileName = date('M,d,Y').'_'.$file->getClientOriginalName();
                $destinationPath = public_path().'/JuniorRecords';
                $input['junior_record'] = $fileName;
                $file->move($destinationPath,$fileName);
            }
            else {
                $input['junior_record'] = 'no file';
            }

            
            $docs->junior_record =  $input['junior_record'];

            $input = $request->senior_record;
            if($file = $request->hasFile('docs_senior_record')) {
                $file = $request->file('docs_senior_record') ;
                $fileName = date('M,d,Y').'_'.$file->getClientOriginalName();
                $destinationPath = public_path().'/JuniorRecords';
                $input['senior_record'] = $fileName;
                $file->move($destinationPath,$fileName);
            }
            else {
                $input['senior_record'] = 'no file';
            }
            $docs->senior_record =  $input['senior_record'];

            $input = $request->validID;
            if($file = $request->hasFile('docs_validID')) {
                $file = $request->file('docs_validID') ;
                $fileName = date('M,d,Y').'_'.$file->getClientOriginalName();
                $destinationPath = public_path().'/ValidIDs';
                $input['validID'] = $fileName;
                $file->move($destinationPath,$fileName);
            }
            else {
                $input['validID'] = 'no file';
            }
            $docs->validID =  $input['validID'];


            $input = $request->form_137;
            if($file = $request->hasFile('docs_form_137')) {
                $file = $request->file('docs_form_137') ;
                $fileName = date('M,d,Y').'_'.$file->getClientOriginalName();
                $destinationPath = public_path().'/Form137';
                $input['form_137'] = $fileName;
                $file->move($destinationPath,$fileName);
            }
            else {
                $input['form_137'] = 'no file';
            }
            $docs->form_137 =  $input['form_137'];

            $input = $request->cert_honors;
            if($file = $request->hasFile('docs_cert_honors')) {
                $file = $request->file('docs_cert_honors') ;
                $fileName = date('M,d,Y').'_'.$file->getClientOriginalName();
                $destinationPath = public_path().'/HonorCert';
                $input['cert_honors'] = $fileName;
                $file->move($destinationPath,$fileName);
            }
            else {
                $input['cert_honors'] = 'no file';
            }
            $docs->cert_honors =  $input['cert_honors'];

            $input = $request->voterscert_parent;
            if($file = $request->hasFile('docs_votercert_parent')) {
                $file = $request->file('docs_votercert_parent') ;
                $fileName = date('M,d,Y').'_'.$file->getClientOriginalName();
                $destinationPath = public_path().'/ParentVoterCert';
                $input['voterscert_parent'] = $fileName;
                $file->move($destinationPath,$fileName);
            }

            else {
                $input['voterscert_parent'] = 'no file';
            }
        
            $docs->voterscert_parent =  $input['voterscert_parent'];

            $input = $request->votercert_applicant;
            if($file = $request->hasFile('docs_votercert_applicant')) {
                $file = $request->file('docs_votercert_applicant') ;
                $fileName = date('M,d,Y').'_'.$file->getClientOriginalName();
                $destinationPath = public_path().'/ApplicantVoterCert';
                $input['votercert_applicant'] = $fileName;
                $file->move($destinationPath,$fileName);
            }
            else {
                $input['votercert_applicant'] = 'no file';
            }
            $docs->votercert_applicant =  $input['votercert_applicant'];

            $input = $request->birthcert;
            if($file = $request->hasFile('docs_birthcert')) {
                $file = $request->file('docs_birthcert') ;
                $fileName = date('M,d,Y').'_'.$file->getClientOriginalName();
                $destinationPath = public_path().'/Birthcert';
                $input['birthcert'] = $fileName;
                $file->move($destinationPath,$fileName);
            }
            else {
                $input['birthcert'] = 'no file';
            }
            $docs->birthcert =  $input['birthcert'];
            
            $docs->save();

        } catch (\Throwable $th) {
            DB::rollback();
            // dd($order);
            return Redirect::to('/logins')->with('error', $th->getMessage());
        }

        DB::commit();

       return Redirect::to('/signup');
   }
}
