<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Scholarshipinfo;
use App\Models\User;
use Auth;
use DB;
use View;
use Redirect;

class ScholarshipController extends Controller
{
    public function create(){
        return view('scholarship.create');
  }

  public function store(Request $request){
        
     $scholars =new Scholarshipinfo([
            "sname" =>$request->sname,
            "description" =>$request->description,
          
        ]);
         $scholars->save();


    return Redirect::to('/scholarships')->with('success','New Scholarship Type Added!');
}

    public function getalltypes()
    {
        //$pets = Pet::with('customer')->get();
    $scholars = Scholarshipinfo::withTrashed()->get();
        //dd($customers);
        return view('scholarship.scholarships',compact('scholars'));
    }

    public function update(Request $request, $scholarship_id)
    {

        $scholar = Scholarshipinfo::find($scholarship_id);
        $scholar->sname = $request->sname;
        $scholar->description = $request->description;

        $scholar->update();



        //return Redirect::to('/employee')->with('success','Updated!');*/
        return redirect()->route('getalltypes')->with('success','Scholarship Details Updated!');
    }
    public function destroy($scholarship_id)
    {

        $scholar = Scholarshipinfo::find($scholarship_id);
        $scholar->delete();

    return Redirect::to('/scholarships')->with('error','Type of Scholarship is Deleted!');
    }


    public function restore($scholarship_id) 
    {
    
        Scholarshipinfo::withTrashed()->where('scholarship_id',$scholarship_id)->restore();
    
    return Redirect::to('/scholarships')->with('info','Type of Scholarship is Restored!');
    }


    public function getScholars(){
        $scho = Scholarshipinfo::all();
        return view('scholarship.index',compact('scho'));
     }


}
