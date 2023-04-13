<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function adminDashboard(){
        return view('admin-dashboard');
    }

    public function adminLogin()
    {
        //dd(session()->get('loginId'));
        // if (!empty(session()->get('loginId'))) {
        //     $user = User::findOrFail(session()->get('loginId'));
        //     if ($user) {
        //         if ($user->is_tutor) {
        //             return redirect('/tutor-dashboard');
        //         }
        //         return redirect('/student-dashboard');
        //     }
        //     return redirect('/');
        // }
        return view('admin-layouts.admin-login');
    }
}
