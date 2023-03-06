<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use Auth;
use DB;
use View;
use Redirect;
// use App\Rules\ValidatePdf;

class DocumentController extends Controller
{

    public function getcreate(){
        return view('document.create');
    }

    public function store(Request $request){
       

         $docs = new Document;
        
         $input = $request->cor_file;

        //  $request->validate([
        //     'docs' => 'mines:pdf'

        // ]);

        // $request->validate([
        //     'docs' => ['required', 'file', new ValidatePdf],
        // ]);

         if($file = $request->hasFile('docs')) {
            $file = $request->file('docs') ;
            
            $fileName = date('M,d,Y').'_'.$file->getClientOriginalName();
            

            $destinationPath = public_path().'/documents';
           
            $input['cor_file'] = $fileName;
            $file->move($destinationPath,$fileName);
             
        }

        $docs->cor_file =  $input['cor_file'];


        $input = $request->grades;

        //  $request->validate([
        //     'docs' => 'mines:pdf'

        // ]);

        // $request->validate([
        //     'docs' => ['required', 'file', new ValidatePdf],
        // ]);

         if($file = $request->hasFile('docsg')) {
            $file = $request->file('docsg') ;
            
            $fileName = date('M,d,Y').'_'.$file->getClientOriginalName();
            

            $destinationPath = public_path().'/documents';
           
            $input['grades'] = $fileName;
            $file->move($destinationPath,$fileName);
             
        }

        $docs->grades =  $input['grades'];

        
        $docs->save();


      
        // Event::dispatch(new SendMail($user));
        // return redirect()->route('logins');
        return Redirect::to('/logins');
    }

    public function showall()
    {
        $data = Document::all();
        return view ('document.showall', compact('data'));
    }
    

    public function viewgrades($id){
        $dataview = Document::find($id);
        return view ('document.viewgrades', compact('dataview'));
    }

    public function viewcor($id){
        $dataview = Document::find($id);
        return view ('document.viewcor', compact('dataview'));
    }
}
