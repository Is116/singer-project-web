<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function addRecord(Request $request){
        $data = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'mobile_no' => 'required',
            'department' => 'required',
            'designation' => 'required',
            // 'photo' => 'required|image|max:1024',
        ]);
        // if ($request->has('photo')) {
        //     $photo = $request->file('photo');
        //     $filename = time() . '_' . $photo->getClientOriginalName();
        //     $photo->storeAs('public/photos', $filename);
        //     $data['photo'] = $filename;
        // }
        $record = Contact::create($data);
        if($record){
            return redirect()->route('view-records')->with('success', 'Record Added Successfully');
        }else{
            return view('addRecords')->with('error', 'Data Insertion Error');
        }   
        
    }

    public function updateRecord(Request $request)
    {
        $updateData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'mobile_no' => 'required',
            'department' => 'required',
            'designation' => 'required',
        ]);
        $record = Contact::whereId($request->id)->update($updateData);
        if($record){
            return redirect()->route('view-records')->with('success', 'Record Updated Successfully');
        }else{
            return view('editRecord')->with('error', 'Data Update Error');
        }   
    }

    public function deleteRecord($id)
    {
        $record = Contact::find($id);

        if (!$record) {
            return redirect()->route('view-records')->with('error', 'No Record Found.');
        }else{
            $record->delete();
            return redirect()->route('view-records')->with('success', 'Record Deleted Successfully');
        }
    }

    public function searchContacts(Request $request){
        $department = $request->input('department');
        $designation = $request->input('designation');
        $search = $request->input('search');


        $records = Contact::where('name', 'like', '%'.$request->search.'%')
                    ->orWhere('email', 'like', '%'.$request->search.'%')
                    ->orWhere('mobile_no', 'like', '%'.$request->search.'%')->get();

        return view('viewRecords', compact('records'));

    }

    // {
    //     $students = Student::all();
    //     return view('viewStudents', compact('students'));
    // }

}
