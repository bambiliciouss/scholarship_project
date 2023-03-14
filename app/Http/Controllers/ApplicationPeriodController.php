<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApplicationPeriod;
use Auth;
use DB;
use View;
use Redirect;

class ApplicationPeriodController extends Controller
{
    public function getallappliperiods()
    {
      
    $appliperiods = ApplicationPeriod::withTrashed()->get();
        //dd($customers);
        return view('applicationperiod.applicationperiods',compact('appliperiods'));
    }

    public function store(Request $request){
        
        $appliperiods =new ApplicationPeriod([
               "acadyears_id" =>$request->acadyears_id,
               "semester" =>$request->semester,
               "start_application" =>$request->start_application,
               "end_application" =>$request->end_application,
               "scholarship_expiration" =>$request->scholarship_expiration,
       
           ]);
            $appliperiods->save();
   
   
       return Redirect::to('/applicationperiods')->with('success','New Application Period Added!');
   }

    public function update(Request $request, $applicationPeriod_id)
    {

        $appli = ApplicationPeriod::find($applicationPeriod_id);
        $appli->acadyears_id = $request->acadyears_id;
        $appli->semester = $request->semester;
        $appli->start_application = $request->start_application;
        $appli->end_application = $request->end_application;
        $appli->scholarship_expiration = $request->scholarship_expiration;

        $appli->update();



        //return Redirect::to('/employee')->with('success','Updated!');*/
        return redirect()->route('getallappliperiods')->with('success','Application Period Details Updated!');
    }

    public function destroy($applicationPeriod_id)
    {

        $acad = ApplicationPeriod::find($applicationPeriod_id);
        $acad->delete();

    return Redirect::to('/applicationperiods')->with('error','Application Period is Deleted!');
    }


    public function restore($applicationPeriod_id) 
    {
    
        ApplicationPeriod::withTrashed()->where('applicationPeriod_id',$applicationPeriod_id)->restore();
    
    return Redirect::to('/applicationperiods')->with('info','Application Period is Restored!');
    }

}
