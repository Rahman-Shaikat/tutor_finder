<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Session\Session;
//use Illuminate\Support\Facades\Auth;


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

    public function studentDashboard(){
        return view('student-dashboard');
    }

    public function studentProfile(){
        return view(('dashboard.student-profile'));
    }

    public function registerUser(Request $request){
        $request->validate([
            'joinas' => 'required',
            //'name' => 'required',
            //'gender' => 'required',
            //'address' => 'required',
            //'postcode' => 'required',
            //'class' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required|unique:users|min:11|max:11',
            'password' => 'required|min:8|max:12'
        ]);
       $user = new User();
       $user->is_tutor=$request->joinas;
        //$user->name=$request->name;
        //$user->gender=$request->gender;
        //$user->address=$request->address;
        //$user->postcode=$request->postcode;
        //$user->class=$request->class;
        $user->email=$request->email;
        $user->phone=$request->phone;
        //$user->password=$request->password;
        $user->password=Hash::make($request->password);
        //$user = User::find(auth()->user()->id);

        if ($request->joinas == 'tutor') {
            $user->is_tutor = 1;
        } else {
            $user->is_tutor = 0;
        }

        $result = $user -> save();

        if($result){
            return back()->with('success', 'You have Successfully Registered.');
        }
        else{
            return back()->with('fail', 'Sorry Something went Wrong.');
        } 

        
    }

    public function loginUser(Request $request){
       
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        

        $user = User::where('email', '=', $request->email)->first();
        if($user){
            if(Hash::check($request->password , $user->password)){
                
               $request->session()->put('loginId' , $user->id);
              
                //Auth::login($user);
                return view('dashboard.student-dashboard');
                
           }
           else{
                
              return back()->with('fail' , 'Incorrect Password.');
           }
        }
        else{
            return back()->with('fail' , 'User not registered.');
        }
        
        //dd(...vars:'login user');
        


    }

    public function logout() {
        if(session()->has('loginId')){
            session()->pull('loginId');
            return redirect('login');
        }
    }
    
    
    public function updateUser(Request $request){
        $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'district' => 'required',
            'area' => 'required',
            'address' => 'required',
            'postcode' => 'required',
            'medium' => 'required',
            'class' => 'required',
            //'email' => 'required|email|unique:users',
            //'phone' => 'required|unique:users|min:11|max:11',
            //'password' => 'required|min:8|max:12'
        ]);
       /*$user = new User();
        $user->name=$request->name;
        $user->gender=$request->gender;
        $user->districtr=$request->districtr;
        $user->area=$request->area;
        $user->address=$request->address;
        $user->postcode=$request->postcode;
        $user->medium=$request->medium;
        $user->class=$request->class;
        $user->institution=$request->institution;
        $user->tutorgender=$request->tutorgender;
        //$user->email=$request->email;
        //$user->phone=$request->phone;
        //$user->password=$request->password;
        //$user->password=Hash::make($request->password);
        $result = $user -> save();

        if($result){
            return back()->with('success', 'You have Successfully Registered.');
        }
        else{
            return back()->with('fail', 'Sorry Something went Wrong.');
        } */

    }

  

    
    
    
    
}
