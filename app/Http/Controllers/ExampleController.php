<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Mail\ContactUsMail;

class ExampleController extends Controller
{
    function login() {
        session()->flash('test1', 'First Laravel session');
        return view('login');
    }
    function contact() {
        return view('contact');
    }

    function cv() {
        
        return view('cv');
    }
        
    function uploadForm(){
        return view('upload');
    }
    public function upload(Request $request){
        $file_extension = $request->image->getClientOriginalExtension();
        $file_name = time() . '.' . $file_extension;
        $path = 'assets/images';
        $request->image->move($path, $file_name);
        return 'Uploaded';
        
}
  public function about() {
        
        return view('about');
    }
    public function test() {
        
        // dd(Student::find(3)?->phone->phone_number);
        // dd(Student::find(1),Student::find(1)->phone->phone_number);
        dd(
            DB::table('students')
            ->join('phones','phones.id','=','students.phone_id')
            ->where('students.id','=',1)
            ->first()

        );
    }
    public function contactData(Request $request)
    {
        // Validate the incoming request data
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:50',
            'subject' => 'required|string|max:250',
            'message' => 'required|string', 
        ]);
        //dd($data);
        // Send the email to a specific user
        Mail::to('your_email@gmail.com')->send(new ContactUsMail($data));
        return view('emails.contactData',compact('data'));
    }
}

