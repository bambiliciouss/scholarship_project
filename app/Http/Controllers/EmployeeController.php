<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use DB;
use View;
use Redirect;
use App\Models\User;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function getSignup(){
        return view('employee.signup');
    }

    public function postSignup(Request $request){
        $this->validate($request, [
        'email' => 'email| required| unique:users',
        'password' => 'required| min:4'
        ]);
        $user = new User([
        'name' => $request->input('fname').' '.$request->lname,
        'email' => $request->input('email'),
        'password' => bcrypt($request->input('password')),
        'role' => "employee"

        ]);

        $user->save();

        $employee = new Employee;
        $employee->user_id = $user->id;
        $employee->fname = $request->fname;
        $employee->lname = $request->lname;
        $employee->addressline = $request->addressline;
        $employee->phone = $request->phone;
        $employee->zipcode = $request->zipcode;
        $employee->town = $request->town;

       
        $input = $request->img_path;

        $request->validate([
           'image' => 'image'

       ]);

        if($file = $request->hasFile('image')) {
           $file = $request->file('image') ;
           
           $fileName = date('M,d,Y').'_'.$file->getClientOriginalName();
           

           $destinationPath = public_path().'/images';
          
           $input['img_path'] = $fileName;
           $file->move($destinationPath,$fileName);
            
       }

        $employee->img_path =  $input['img_path'];

        //dd($employee);

        $employee->save();
        Auth::login($user);

        return redirect()->route('employee.profile');
        //return Redirect::to('/home');

    }

    public function getProfile(){


        $id = Employee::where('user_id',Auth::id())->first();
        $employee = Employee::with('user')->where('user_id',$id->user_id)->get();
        //dd($employee);
        return view('employee.profile',compact('employee'));


    }

    public function update(Request $request, $employee_id)
    {

        $employee = Employee::find($employee_id);
        $employee->lname = $request->lname;
        $employee->fname = $request->fname;
        $employee->addressline = $request->addressline;
        $employee->zipcode = $request->zipcode;
        $employee->phone = $request->phone;

        if($file = $request->hasFile('image')) {
            $destination ='/images'.$student->img_path;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('image') ;
    
            $fileName = $file->getClientOriginalName();

            $destinationPath = public_path().'/images';
           // dd(public_path());
            $input['image'] = $fileName;
            
            $file->move($destinationPath,$fileName);
            $employee->img_path = $fileName;
        }


        $employee->update();

        $emp= Auth::user()->id;
        $user = User::find($emp);
        $user->name = $request->fname.' '.$request->lname;
        $user->email = $request->email;
        $user->save();

        //return Redirect::to('/employee')->with('success','Updated!');*/
          return redirect()->route('employee.profile');
 
    }


    public function getEmployees()
    {
       
       $employees = Employee::with('user')->withTrashed()->get();

        return view('employee.employees',compact('employees'));
    }

    public function destroy($employee_id)
    {

        $Employee = Employee::find($employee_id);
        $Employee->delete();

       return Redirect::to('/employees')->with('success','Employee Deactivated!');
    }


    public function restore($employee_id) 
    {
       
        Employee::withTrashed()->where('employee_id',$employee_id)->restore();
      
       return Redirect::to('/employees')->with('success','Employee Activated!');
    }






}
