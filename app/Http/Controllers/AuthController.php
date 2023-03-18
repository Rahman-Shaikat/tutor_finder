<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;

class AuthController extends Controller
{
    public function login(){
        return view('login');
    }
    
    public function registration(){
        return view('registration');
    }

    public function t_reg(){
        return view('t_reg');
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
        $user = new Users();
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
        }
    }
    
}
