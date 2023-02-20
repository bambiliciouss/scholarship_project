<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
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

                        return redirect()->route('user.logout');
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

                        return redirect()->route('user.logout');
                    }
                    else{
                         return redirect()->route('employee.profile');
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

            // else{
            //     return redirect()->route('user.signins')
            //     ->with('error','Email-Address And Password Are Wrong.');
            // }
        }


        public function logout(){
            Auth::logout();
            return redirect()->guest('/logins');
        }
}