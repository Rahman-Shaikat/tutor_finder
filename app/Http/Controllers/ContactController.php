<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function contact(){
        return view('contact');
    }

    public function contactSubmit(Request $request){
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'phone_number' => 'required|digits:11',
            'message' => 'required|string|max:1000',
        ]);
        $data = array(
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone_number,
            'message' => $request->message,
        );
        Mail::send('email/contact-email', ['data' => $data], function ($message) use ($data) {
            $message->from($data['email'], $data['name']);
            $message->to('shaikat3257@gmail.com')->subject('Contact Form');
        });
        return back()->with('success', 'Contact Form submitted successfully!');
    }
}
