<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function adminDashboard(){
        return view('admin-layouts.admin-dashboard');
    }

    public function adminLogin()
    {
        return view('admin-layouts.admin-login');
    }

    public function adminLoginSubmit(Request $request){
        $request->validate([
            'email' => 'required|email|max:100',
            'password' => 'required|string|max:12|min:8'
        ]);
         if (!empty(session()->get('loginId'))) {
            $user = User::findOrFail(session()->get('loginId'));
            if ($user) {
                if ($user->is_admin == 1) {
                    return redirect('/admin/dashboard');
                }
                if ($user->is_tutor) {
                    return redirect('/tutor/dashboard');
                }
                return redirect('/student/dashboard');
            }
            return redirect('/');
        }
    }
}
