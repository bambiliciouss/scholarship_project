<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\AcademicYear;
use Auth;
use DB;
use View;
use Redirect;

class AcademicYearController extends Controller
{
//     public function create(){
//         return view('academicyear.create');
//   }

  public function store(Request $request){
        
     $acadyear =new AcademicYear([
            "description" =>$request->description,
          
        ]);
         $acadyear->save();


    return Redirect::to('/academicyears')->with('success','New Academic Year Added!');
}

    public function getallyears()
    {
        //$pets = Pet::with('customer')->get();
    $acadyears = AcademicYear::withTrashed()->get();
        //dd($customers);
        return view('academicyear.academicyears',compact('acadyears'));
    }

    public function update(Request $request, $acadyears_id)
    {

        $acad = AcademicYear::find($acadyears_id);
        $acad->description = $request->description;

        $acad->update();



        //return Redirect::to('/employee')->with('success','Updated!');*/
        return redirect()->route('getallyears')->with('success','Academic Year Details Updated!');
    }
    public function destroy($acadyears_id)
    {

        $acad = AcademicYear::find($acadyears_id);
        $acad->delete();

    return Redirect::to('/academicyears')->with('success','Academic Year is Deleted!');
    }


    public function restore($acadyears_id) 
    {
    
        AcademicYear::withTrashed()->where('acadyears_id',$acadyears_id)->restore();
    
    return Redirect::to('/academicyears')->with('success','Academic Year is Restored!');
    }


    

}