<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Studentinfo;
use App\Models\ApplicationPeriod;
use Auth;
use DB;
use View;
use Redirect;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;

class TransactionController extends Controller
{
    public function getcreate(){
 
        $appliperiod = DB::table('application_periods')
                    ->join('academic_years', 'application_periods.acadyears_id', '=', 'academic_years.acadyears_id')
                    ->select(DB::raw("CONCAT(academic_years.description, ' - ', application_periods.semester) AS full_description"), 'application_periods.applicationPeriod_id')
                    ->where('application_periods.end_application', '>=', now())
                    ->pluck('full_description', 'application_periods.applicationPeriod_id');
          
                   // dd($categories);
                   $stud = Studentinfo::where('user_id',Auth::id())->first();
                   $student = Studentinfo::where('user_id',$stud->user_id)->first()->student_id;

          return view('transaction.create',  compact('appliperiod', 'student'));
    }

    public function store(Request $request){

        
        // $stud = Studentinfo::where('user_id',Auth::id())->first();
        // $student = Studentinfo::where('user_id',$stud->user_id)->first()->student_id;


        // $request->validate([
        //     'school_year' => 'unique:application_transactions,applicationPeriod_id|required',
        // ], [
        //     'unique' => 'You already have an application to this school year and semester.',
        // ]);

        $request->validate([
            'student_id' => 'required',
            'applicationPeriod_id' => [
                'required',
                Rule::unique('application_transactions')->where(function ($query) use ($request) {
                    return $query->where('student_id', $request->student_id)
                                 ->where('applicationPeriod_id', $request->applicationPeriod_id);
                }),
            ],
        ], [
   
            'applicationPeriod_id.unique' => 'You already have an application to this school year and semester.',
        ]);

        

        $id = $request->applicationPeriod_id;
        // dd($id);
        $appliperiod = ApplicationPeriod::find($id);
        if ($appliperiod->end_application < now()) {
            return redirect()->route('scholarship.index')->with('error','Application is Already Closed');
        } 
        elseif($appliperiod->start_application > now()){
            return redirect()->route('scholarship.index')->with('error','Application is Not Yet Open');

        }
        
        
        else {
            // Transaction is still valid
        


       
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
            $docs->applicationPeriod_id =$request->applicationPeriod_id;
            $docs->scholarship_id = $request->scholarship_id;
            $docs->status = "Processing";


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
                $destinationPath = public_path().'/SeniorRecords';
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
            return Redirect::to('/showtransactions')->with('error', $th->getMessage());
        }

        DB::commit();

       return Redirect::to('/showtransactions')->with('success','Application is submitted');
    }
   }


   public function getApplications()
    {
        //$pets = Pet::with('customer')->get();
    //    $appli = Transaction::with('students', 'scholarship', 'application_period')->withTrashed()->get();
       $appli = DB::table('application_transactions')
       ->join('studentinfo', 'application_transactions.student_id', '=', 'studentinfo.student_id')
       ->join('scholarshipinfo', 'application_transactions.scholarship_id', '=', 'scholarshipinfo.scholarship_id')
       ->join('application_periods', 'application_transactions.applicationPeriod_id', '=', 'application_periods.applicationPeriod_id')
       ->join('academic_years', 'application_periods.acadyears_id', '=', 'academic_years.acadyears_id')
       ->select('application_transactions.*', 'studentinfo.fname as fname','studentinfo.lname as lname',DB::raw("CONCAT(academic_years.description, ' - ', application_periods.semester) AS syear_semester"), 'scholarshipinfo.sname as scho_name'  )
       ->whereNull('application_transactions.deleted_at')
       ->get();

      $appliupdate1 = DB::table('application_transactions')
      ->join('application_periods', 'application_transactions.applicationPeriod_id', '=', 'application_periods.applicationPeriod_id')
      ->where('application_periods.scholarship_expiration', '<=', now())
      ->where('application_transactions.status', '=', 'approved')
      ->update(['application_transactions.status' => 'completed']);

      $appliupdate2 = DB::table('application_transactions')
      ->join('application_periods', 'application_transactions.applicationPeriod_id', '=', 'application_periods.applicationPeriod_id')
      ->where('application_periods.scholarship_expiration', '<=', now())
      ->where('application_transactions.status', '=', 'rejected')
      ->update(['application_transactions.status' => 'try again next semester']);

        //dd($customers);
        return view('transaction.transactions',compact('appli', 'appliupdate1', 'appliupdate2'));
    }

    public function viewcor($id){
        $dataview = Transaction::find($id);
        return view ('transaction.viewcor', compact('dataview'));
    }

    public function viewgrades($id){
        $dataview = Transaction::find($id);
        return view ('transaction.viewgrades', compact('dataview'));
    }

    public function viewjuniorrecords($id){
        $dataview = Transaction::find($id);
        return view ('transaction.viewjuniorrecords', compact('dataview'));
    }

    public function viewseniorrecords($id){
        $dataview = Transaction::find($id);
        return view ('transaction.viewseniorrecords', compact('dataview'));
    }

    public function viewvalidID($id){
        $dataview = Transaction::find($id);
        return view ('transaction.viewvalidID', compact('dataview'));
    }

    public function viewform137($id){
        $dataview = Transaction::find($id);
        return view ('transaction.viewform137', compact('dataview'));
    }

    public function viewcerthonors($id){
        $dataview = Transaction::find($id);
        return view ('transaction.viewcerthonors', compact('dataview'));
    }

    public function viewparentvoters($id){
        $dataview = Transaction::find($id);
        return view ('transaction.viewparentvoters', compact('dataview'));
    }

    public function viewapplicantvoters($id){
        $dataview = Transaction::find($id);
        return view ('transaction.viewapplicantvoters', compact('dataview'));
    }

    public function viewbirthcert($id){
        $dataview = Transaction::find($id);
        return view ('transaction.viewbirthcert', compact('dataview'));
    }

    public function showtransactionhistory(){

        $stud = Studentinfo::where('user_id',Auth::id())->first();
        $student = Studentinfo::where('user_id',$stud->user_id)->first()->student_id;

        $dataview =  DB::table('application_transactions')
       ->join('studentinfo', 'application_transactions.student_id', '=', 'studentinfo.student_id')
       ->join('scholarshipinfo', 'application_transactions.scholarship_id', '=', 'scholarshipinfo.scholarship_id')
       ->join('application_periods', 'application_transactions.applicationPeriod_id', '=', 'application_periods.applicationPeriod_id')
       ->join('academic_years', 'application_periods.acadyears_id', '=', 'academic_years.acadyears_id')
       ->select('application_transactions.*', 'studentinfo.fname as fname','studentinfo.lname as lname',DB::raw("CONCAT(academic_years.description, ' - ', application_periods.semester) AS syear_semester"), 'scholarshipinfo.sname as scho_name' ,'application_periods.end_application AS expiration')
       ->where('application_transactions.student_id', '=', $student)
       ->get();
       //dd($dataview);

       $appliperiod = DB::table('application_periods')
       ->join('academic_years', 'application_periods.acadyears_id', '=', 'academic_years.acadyears_id')
       ->select(DB::raw("CONCAT(academic_years.description, ' - ', application_periods.semester) AS full_description"), 'application_periods.applicationPeriod_id')
       ->pluck('full_description', 'application_periods.applicationPeriod_id');
        return view ('user.transactionhistory', compact('dataview', 'appliperiod'));
    }
    
    public function update(Request $request, $application_transaction_id)
    {
        $id = $request->school_year;
        // dd($id);
        $appliperiod = ApplicationPeriod::find($id);
        if ($appliperiod->end_application < now()) {
            return redirect()->route('transaction.showtransactionhistory')->with('error','Application is Already Closed');
        } 
        elseif($appliperiod->start_application > now()){
            return redirect()->route('transaction.showtransactionhistory')->with('error','Application is Not Yet Open');

        }
        
        
        else {
            // Transaction is still valid
        


       
        try {
            DB::beginTransaction();
            $docs = Transaction::find($application_transaction_id);

            $stud = Studentinfo::where('user_id',Auth::id())->first();
            $student = Studentinfo::where('user_id',$stud->user_id)->first()->student_id;

            //dd($student);
            

            $docs->student_id = $student;
            $docs->school_name = $request->school_name;
            $docs->year_level = $request->year_level;
            $docs->application_status = $request->application_status;
            $docs->applicationPeriod_id =$request->school_year;
            $docs->scholarship_id = $request->scholarship_id;
            $docs->status = "Processing";


            if($file = $request->hasFile('docs_enrollmentform')) {
                $destination ='/EnrollmentForm'.$docs->enrollment_form;
                if(File::exists($destination))
                {
                    File::delete($destination);
                }
                $file = $request->file('docs_enrollmentform') ;
        
                $fileName = $file->getClientOriginalName();
    
                $destinationPath = public_path().'/EnrollmentForm';
               // dd(public_path());
                $input['docs_enrollmentform'] = $fileName;
                
                $file->move($destinationPath,$fileName);
                $docs->enrollment_form = $fileName;

            }

            // $input = $request->grades_copy;
            if($file = $request->hasFile('docs_grades_copy')) {
                $destination ='/GradesCopies'.$docs->grades_copy;
                if(File::exists($destination))
                {
                    File::delete($destination);
                }
                $file = $request->file('docs_grades_copy') ;
        
                $fileName = $file->getClientOriginalName();
    
                $destinationPath = public_path().'/GradesCopies';
               // dd(public_path());
                $input['docs_grades_copy'] = $fileName;
                
                $file->move($destinationPath,$fileName);
                $docs->grades_copy = $fileName;

            }
          
            // $docs->grades_copy =  $input['grades_copy'];

            // $input = $request->junior_record;
            if($file = $request->hasFile('docs_junior_record')) {
                $destination ='/JuniorRecords'.$docs->junior_record;
                if(File::exists($destination))
                {
                    File::delete($destination);
                }
                $file = $request->file('docs_junior_record') ;
        
                $fileName = $file->getClientOriginalName();
    
                $destinationPath = public_path().'/JuniorRecords';
               // dd(public_path());
                $input['docs_junior_record'] = $fileName;
                
                $file->move($destinationPath,$fileName);
                $docs->junior_record = $fileName;
            }
      
            // $docs->junior_record =  $input['junior_record'];

            // $input = $request->senior_record;
            if($file = $request->hasFile('docs_senior_record')) {
                $destination ='/SeniorRecords'.$docs->senior_record;
                if(File::exists($destination))
                {
                    File::delete($destination);
                }
                $file = $request->file('docs_senior_record') ;
        
                $fileName = $file->getClientOriginalName();
    
                $destinationPath = public_path().'/SeniorRecords';
               // dd(public_path());
                $input['docs_senior_record'] = $fileName;
                
                $file->move($destinationPath,$fileName);
                $docs->senior_record = $fileName;

            }
           
            // $docs->senior_record =  $input['senior_record'];

            // $input = $request->validID;
            if($file = $request->hasFile('docs_validID')) {
                $destination ='/ValidIDs'.$docs->validID;
                if(File::exists($destination))
                {
                    File::delete($destination);
                }
                $file = $request->file('docs_validID') ;
        
                $fileName = $file->getClientOriginalName();
    
                $destinationPath = public_path().'/ValidIDs';
               // dd(public_path());
                $input['docs_validID'] = $fileName;
                
                $file->move($destinationPath,$fileName);
                $docs->validID = $fileName;
            }
           
            // $docs->validID =  $input['validID'];


            // $input = $request->form_137;
            if($file = $request->hasFile('docs_form_137')) {
                $destination ='/Form137'.$docs->form_137;
                if(File::exists($destination))
                {
                    File::delete($destination);
                }
                $file = $request->file('docs_form_137') ;
        
                $fileName = $file->getClientOriginalName();
    
                $destinationPath = public_path().'/Form137';
               // dd(public_path());
                $input['docs_form_137'] = $fileName;
                
                $file->move($destinationPath,$fileName);
                $docs->form_137 = $fileName;
            }
          
            // $docs->form_137 =  $input['form_137'];

            // $input = $request->cert_honors;
            if($file = $request->hasFile('docs_cert_honors')) {
                $destination ='/HonorCert'.$docs->cert_honors;
                if(File::exists($destination))
                {
                    File::delete($destination);
                }
                $file = $request->file('docs_cert_honors') ;
        
                $fileName = $file->getClientOriginalName();
    
                $destinationPath = public_path().'/HonorCert';
               // dd(public_path());
                $input['docs_cert_honors'] = $fileName;
                
                $file->move($destinationPath,$fileName);
                $docs->cert_honors = $fileName;
            }
           
            // $docs->cert_honors =  $input['cert_honors'];

            // $input = $request->voterscert_parent;
            if($file = $request->hasFile('docs_votercert_parent')) {
                $destination ='/ParentVoterCert'.$docs->voterscert_parent;
                if(File::exists($destination))
                {
                    File::delete($destination);
                }
                $file = $request->file('docs_votercert_parent') ;
        
                $fileName = $file->getClientOriginalName();
    
                $destinationPath = public_path().'/ParentVoterCert';
               // dd(public_path());
                $input['docs_votercert_parent'] = $fileName;
                
                $file->move($destinationPath,$fileName);
                $docs->voterscert_parent = $fileName;
            }

           
        
            // $docs->voterscert_parent =  $input['voterscert_parent'];

            // $input = $request->votercert_applicant;
            if($file = $request->hasFile('docs_votercert_applicant')) {

                $destination ='/ApplicantVoterCert'.$docs->votercert_applicant;
                if(File::exists($destination))
                {
                    File::delete($destination);
                }
                $file = $request->file('docs_votercert_applicant') ;
        
                $fileName = $file->getClientOriginalName();
    
                $destinationPath = public_path().'/ApplicantVoterCert';
               // dd(public_path());
                $input['docs_votercert_applicant'] = $fileName;
                
                $file->move($destinationPath,$fileName);
                $docs->votercert_applicant = $fileName;
            }
          
            // $docs->votercert_applicant =  $input['votercert_applicant'];

            // $input = $request->birthcert;
            if($file = $request->hasFile('docs_birthcert')) {
                $destination ='/Birthcert'.$docs->votercebirthcertrt_applicant;
                if(File::exists($destination))
                {
                    File::delete($destination);
                }
                $file = $request->file('docs_birthcert') ;
        
                $fileName = $file->getClientOriginalName();
    
                $destinationPath = public_path().'/Birthcert';
               // dd(public_path());
                $input['docs_birthcert'] = $fileName;
                
                $file->move($destinationPath,$fileName);
                $docs->birthcert = $fileName;
            }
           
            // $docs->birthcert =  $input['birthcert'];
            //dd($docs);
            $docs->save();

        } catch (\Throwable $th) {
            DB::rollback();
            // dd($order);
            return Redirect::to('/logins')->with('error', $th->getMessage());
        }

        DB::commit();

       return Redirect::to('/showtransactions')->with('success','Application is updated');
    }
    }

    public function destroy($application_transaction_id)
    {

        $acad = Transaction::find($application_transaction_id);
        $acad->delete();

    return Redirect::to('/showtransactions')->with('success','Application is Deleted!');
    }


    public function restore($application_transaction_id) 
    {
    
        Transaction::withTrashed()->where('application_transaction_id',$application_transaction_id)->restore();
    
    return Redirect::to('/showtransactions')->with('success','Application is Restored!');
    }


}
