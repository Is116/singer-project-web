<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class viewsController extends Controller
{
    public function viewRecords(){
        $records = Contact::orderBy('id','ASC')->get();
        return view('viewRecords', compact('records'));
    }
    public function addRecord(){
        return view('addRecord');
    }
    public function editRecord($id){
        $record = Contact::find($id);
        if($record){
            return view('editRecord',compact('record'));
        }else{
            return redirect()->route('view-records')->with('error', 'No Contact Found');
        }
        
    }
}
