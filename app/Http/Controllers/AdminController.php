<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminController extends Controller
{
    public function adminDashboard()
    {
        return view('admin-layouts.admin-dashboard');
    }

    public function adminLogin()
    {
        return view('admin-layouts.admin-login');
    }

    public function adminLoginSubmit(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'email' => 'required|email|max:100',
            'password' => 'required|string|max:12|min:8'
        ]);
        $user = User::where('email', '=', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                if ($user->is_admin == 1) {
                    $request->session()->put('loginId', $user->id);
                    return redirect()->route('admin-dashboard');
                }
                session()->pull('loginId');
                return redirect('/');
            }
        }
    }
}
