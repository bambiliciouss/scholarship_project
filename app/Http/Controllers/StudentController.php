<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentInfo;
use App\Models\User;
use Auth;
use DB;
use View;
use Redirect;

use Yajra\DataTables\Html\Builder;
use Illuminate\Support\Facades\File;



class StudentController extends Controller
{
    public function getSignup(){
        return view('user.signup');
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
          'role'=>"student"

        ]);

         $user->save();
       

         $student = new StudentInfo;
         $student->lname = $request->lname;
         $student->fname = $request->fname;
         $student->midname = $request->midname;
         $student->addressline = $request->addressline;
         $student->barangay = $request->barangay;
         $student->age = $request->age;
         $student->gender = $request->gender;
         $student->phone = $request->phone;
         $student->religion = $request->religion;
         $student->date_of_birth = $request->date_of_birth;
         $student->place_of_birth = $request->place_of_birth;
         $student->father_name = $request->father_name;
         $student->mother_name = $request->mother_name;
         $student->user_id = $user->id;

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

        $student->img_path =  $input['img_path'];
        $student->save();


        Auth::login($user);
        // Event::dispatch(new SendMail($user));
        return redirect()->route('user.profile');
        // return Redirect::to('/home');
    }

    public function getProfile(){
        
        //$student = Studentinfo::find(1)->get();
        
        $id = Studentinfo::where('user_id',Auth::id())->first();
        $student = Studentinfo::with('user')->where('user_id',$id->user_id)->get();
        //dd($id);
        return view('user.profile',compact('student'));
    }

    // public function edit($student_id)
    // {
    // //   $stud= Auth::user()->id;
    // //    $student = Studentinfo::find($student_id);\
    // $stud= User::find(1);
    // $student = Studentinfo::find(1);
    
    // $users = DB::table('studentinfo')
    //             ->Join('users','users.id','=','studentinfo.user_id')
    //             ->select('users.*')
    //             ->where('users.id','=',$stud)
    //             ->get();
                
    //     //dd($student);
    //     //return View::make('user.edit',compact('student','users'));
    //     return view('exampleModal',compact('student','users'));
    //     //return Redirect::to('/edit');
    // }

    public function update(Request $request, $student_id)
    {

        $student = Studentinfo::find($student_id);
        $student->lname = $request->lname;
        $student->fname = $request->fname;
        $student->midname = $request->midname;
        $student->addressline = $request->addressline;
        $student->barangay = $request->barangay;
        $student->age = $request->age;
        $student->gender = $request->gender;
        $student->phone = $request->phone;
        $student->religion = $request->religion;
        $student->date_of_birth = $request->date_of_birth;
        $student->place_of_birth = $request->place_of_birth;
        $student->father_name = $request->father_name;
        $student->mother_name = $request->mother_name;

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
            $student->img_path = $fileName;
        }

        //dd($student);
        $student->update();

        $stud= Auth::user()->id;
        $user = User::find($stud);
        $user->name = $request->fname.' '.$request->lname;
        $user->email = $request->email;
        $user->save();

        //return Redirect::to('/employee')->with('success','Updated!');*/
          return redirect()->route('user.profile');
 
    }



    // public function getStudents(StudentsDataTable $dataTable)
    // {
    //     //$pets = Pet::with('customer')->get();
    //    $students = StudentInfo::with('user')->get();
    //     //dd($customers);
    //     return $dataTable->render('user.users', compact('students'));
    // }

    public function getStudents()
    {
        //$pets = Pet::with('customer')->get();
       $students = StudentInfo::with('user')->withTrashed()->get();
        //dd($customers);
        return view('user.users',compact('students'));
    }

    public function destroy($student_id)
    {

        $student = Studentinfo::find($student_id);
        $student->delete();

       return Redirect::to('/students')->with('success','Student Account Deactivated!');
    }


    public function restore($student_id) 
    {
       
        Studentinfo::withTrashed()->where('student_id',$student_id)->restore();
      
       return Redirect::to('/students')->with('success','Student Account Activated!');
    }



}
