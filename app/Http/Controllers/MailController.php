<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Mail;
use Redirect;
use DB;
use App\Mail\EmailNotification;
use Illuminate\Support\Facades\Mail;
use App\Models\Employee;
use Auth;
class MailController extends Controller
{
    public function index(Request $request, $id )
    {

        $data = DB::table('application_transactions')
        ->join('studentinfo', 'application_transactions.student_id', '=', 'studentinfo.student_id')
        ->join('users', 'users.id', '=', 'studentinfo.user_id')
        ->join('scholarshipinfo', 'application_transactions.scholarship_id', '=', 'scholarshipinfo.scholarship_id')
        ->join('application_periods', 'application_transactions.applicationPeriod_id', '=', 'application_periods.applicationPeriod_id')
        ->join('academic_years', 'application_periods.acadyears_id', '=', 'academic_years.acadyears_id')
        ->select('application_transactions.*', 'studentinfo.fname as fname','studentinfo.lname as lname',DB::raw("CONCAT(academic_years.description, ' - ', application_periods.semester) AS syear_semester"), 'scholarshipinfo.sname as scho_name' , 'users.email as email_add' )
        ->where('application_transactions.application_transaction_id', '=', $id)
        ->get();

        $employee = Employee::where('user_id',Auth::id())->first();
        //$employee = Employee::where('user_id',$emp->user_id)->first()->employee_id;

        //dd($emp);

        //dd($appli);

        // $mail = new EmailNotification($data );


 
        // $data = [
        //     'body' => 'hehez'

        // ];

       try {
        Mail::to($data[0]->email_add)->send(new EmailNotification($data, $employee ));
        
        // return response()->json(['Great check your email!!!!']);
        return Redirect::to('/applications')->with('success', 'Email Sent');


       } catch (\Throwable $th) {
        return Redirect::to('/applications')->with('error', $th->getMessage());
        // return response()->json(['Sorry something went wrong!']);
       }

 
    }
}
