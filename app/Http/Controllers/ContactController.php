<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index(){
        return view('contact');
    }

    public function update(Request $request){
        $request->validate([
            'name' =>  'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone'=>'string|max:12|regex:/([0-9])/',
            'msg'=>'required|max:250'
        ]);

        $newMsg=Contact::create([
            'uname' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'msg' => $request->msg
        ]);
        
        
        Mail::to($request->email)->send(new ContactFormMail( $request->name, $request->phone, $request->msg ));

        return redirect('contact')->with('success', 'Thank you for your message, we will reply you as soon as possible ! ');
    }
}
