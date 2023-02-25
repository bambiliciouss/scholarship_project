<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Auth;
use Redirect;

use App\Models\User;
use App\Models\StudentInfo;
use App\Models\Employee;
class LoginController extends Controller
{
    public function postSignin(Request $request){
        $this->validate($request, [
            'email' => 'email| required',
            'password' => 'required| min:4'
        ]);

        if(auth()->attempt(array('email' => $request->email, 'password' => $request->password)))
            {
                if (auth()->user()->role === 'student'){
                    $stu= Auth::user()->id;
                    $student = StudentInfo::where('user_id',$stu)->get();
                    if($student->isEmpty()){

                        return redirect()->route('user.logout')->with('success','It looks like your account has been disabled. Please contact our team for recovery of account');;
                    }
                    else{
                         return redirect()->route('user.profile');
                    }
                }

                // if (auth()->user()->role === 'employee'){
                //     $emp= Auth::user()->id;
                //     $employee = Employee::where('user_id',$emp)->get();
                //     if($employee->isEmpty()){

                //         return redirect()->route('user.logout');
                //     }
                //     else{
                //          return redirect()->route('employee.profile');
                //     }
                // }

                else {
                    $emp= Auth::user()->id;
                    $employee = Employee::where('user_id',$emp)->get();
                    if($employee->isEmpty()){

                        //return redirect()->route('user.logout')->with('success','Employee Restored!');
                       return Redirect::to('/logins')->with('error','Account is Deactivated!');
                    }

                    else{
                         return redirect()->route('employee.profile')->with('success','Login Successfully');
                    }
                }

               

                // else {
                //     $emp= Auth::user()->id;
                //     $employee = Employee::where('user_id',$emp)->get();
                //     if($employee->isEmpty()){
                //         return redirect()->route('user.logout');
                //     }
                //     else{
                //         //return redirect()->route('dashboard.index');
                //         return redirect()->route('employee.profile');
                //     }
                // }
            }

            else{
                return Redirect::to('/logins')->with('error','Account is not Registered');
            }


        }
   



        public function logout(){
            Auth::logout();
            return redirect()->guest('/logins')->with('success','Logout Successfully');
        }
}