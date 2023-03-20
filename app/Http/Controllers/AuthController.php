<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Foundation\Auth\User;

class AuthController extends Controller
{
    public function login(){
        return view('login');
    }
    
    public function registration(){
        return view('registration');
    }

    public function tutorRegistration(){
        return view('tutor_registration');
    }

    public function registerUser(Request $request){
        $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'postcode' => 'required',
            'class' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required|unique:users',
            'password' => 'required|min:8|max:12'
        ]);
       /* $user = new Users();
        $user->name=$request->name;
        $user->gender=$request->gender;
        $user->address=$request->address;
        $user->postcode=$request->postcode;
        $user->class=$request->class;
        $user->email=$request->email;
        $user->phone=$request->phone;
        $user->password=$request->password;

        $result = $user -> save();

        if($result){
            return back()->with('success', 'You have Successfully Registered.');
        }
        else{
            return back()->with('fail', 'Sorry Something went Wrong.');
        }  */

        
    }

    public function loginUser(Request $request){
       
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|max:12'
        ]);

        $user = Users::where('email', '=', $request->email)->first();
        if($user){

        }
        else{
            return redirect()->with('fail', 'User not registered.');
        }
        


    }
    
    
}
