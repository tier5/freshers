<?php

namespace App\Http\Controllers;

use App\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests;

class PageController extends Controller
{
    public function about()
    {
        return view('about.about');
    }
    public function getcontact()
    {
        return view('contact.contact');
    }
    public function postcontact(Requests\ContactUsRequest $request)
    {
        $contacts= new ContactUs();
        $contacts->first_name=$request->first_name;
        $contacts->last_name=$request->last_name;
        $contacts->email=$request->email;
        $contacts->phone=$request->phone;
        $contacts->message=$request->message;
        $contacts->save();
        Mail::send('emails.contactus', ['request' => $request->_token, 'name' => $request->first_name, 'email' => $request->email], function ($m) use ($request) {
            $m->to($request->email, $request->first_name)->subject('Thank you for your Interest');
        });
        return redirect()->back()->with('success','Thank you for submitting your request. We will get back to you soon.');
    }
}
