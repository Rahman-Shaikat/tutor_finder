<?php

namespace App\Http\Controllers;

use App\Models\District;
use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Session\Session;
//use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function login()
    {
        if (session()->get('loginId')) {
            $user = User::findOrFail(session()->get('loginId'));
            if ($user) {
                if ($user->is_tutor == 0 && $user->is_admin == 1) {
                    return redirect('/admin/dashboard');
                } else if ($user->is_tutor == 1 && !$user->is_admin) {
                    return redirect('/tutor/dashboard');
                } else if ($user->is_tutor == 0 && !$user->is_admin) {
                    return redirect('/student/dashboard');
                }
            }
            return redirect('/');
        }
        //dd(session()->get('loginId'));
        if (!empty(session()->get('loginId'))) {
            $user = User::findOrFail(session()->get('loginId'));
            if ($user) {
                if ($user->is_tutor) {
                    return redirect('/tutor-dashboard');
                }
                return redirect('/student-dashboard');
            }
            return redirect('/');
        }
        return view('login');
    }

    public function registration()
    {
        return view('registration');
    }

    public function registerUser(Request $request)
    {
        $request->validate([
            'joinas' => 'required',
            'name'=> 'required|string|max:100',
            'email' => 'required|email|unique:users|max:100',
            'phone' => [
                'required',
                'unique:users',
                'min:11',
                'max:11',
                'regex:/^(013|017|015|016|019|018|014)\d{8}$/'
            ],
            //'phone' => 'required|unique:users|min:11|max:11|regex:/^(013|017|015|016|019|018)\d{8}$/',
            'password' => 'required|min:8|max:12'
        ]);
        $user = new User();
        $user->is_tutor = $request->joinas;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->status = 2;

        if ($request->joinas == 'tutor') {
            $user->is_tutor = true;
        } else {
            $user->is_tutor = false;
        }

        $result = $user->save();

        if ($result) {
            return to_route('login')->with('success', 'You have Successfully Registered. Please LogIn.');
        } else {
            return back()->with('fail', 'Sorry Something went Wrong.');
        }
    }

    public function loginUser(Request $request)
    {

        $request->validate([
            'email' => 'required|email|max:100',
            'password' => 'required|string|max:12|min:8'
        ]);

        $user = User::where('email', '=', $request->email)->first();



        if ($user) {

            if (Hash::check($request->password, $user->password)) {
                if ($user->is_tutor) {
                    $request->session()->put('loginId', $user->id);
                    //return view('dashboard.tutor-dashboard');
                    return redirect()->route('tutor-dashboard');
                } else {
                    $request->session()->put('loginId', $user->id);
                    //return view('dashboard.student-dashboard');
                    return redirect()->route('student-dashboard');
                }
            } else {

                return back()->with('fail', 'Incorrect Password.');
            }
        } else {
            return back()->with('fail', 'User not registered.');
        }
    }

    public function logout()
    {
        if (session()->has('loginId')) {
            session()->pull('loginId');
            return redirect('login');
        }
    }
}
