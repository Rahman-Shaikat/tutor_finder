<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminController extends Controller
{
    public function adminDashboard()
    {
        $pending=User::where('is_tutor',1)->where('status',2)->count();
        $approved=User::where('is_tutor',1)->where('status',1)->count();
        $declined=User::where('is_tutor',1)->where('status',3)->count();
        $total_std=User::where('is_tutor',0)->where('is_admin',0)->count();
        return view('admin-layouts.admin-dashboard', compact('pending','approved','declined','total_std'));
    }

    public function adminLogin()
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

    public function tutorReqList()
    {
        $tutor_req = User::where('is_tutor', 1)->where('status', 2)->get();
       // dd($tutor_req);
        return view('admin-layouts.tutor-req-list', compact('tutor_req'));
    }


    public function adminLogout()
    {
        if (session()->has('loginId')) {
            session()->pull('loginId');
            return to_route('admin-login');
        }
    }

    public function turorReqApproval(Request $request, $tutor_id){
        $status = User::where('id', $tutor_id)->first();
        //dd($status);
        if (!empty($status)) {
            $msg = '';
            if ($request->accept == 1) {
                $status->status = 1;
                $msg = 'Request has been approved.';
            } elseif ($request->decline == 3) {
                $status->status = 3;
                $msg = 'Request has been declined.';
            } else {
                abort(404);
            }
            $status->update();
            return to_route('approved-tutors')->with('success', $msg);
        }
        abort(404);
    }

    public function approvedTutors(){
        $tutor_data = User::findOrFail(session()->get('loginId'));
        $tutor_req = User::where('is_tutor', 1)->get();
        //dd($std_req);
        return view('admin-layouts.approved-tutors', compact('tutor_req'));
    }
    public function changeTutorStatus($status, $tutor_id)
    {
        $order = User::findOrFail($tutor_id);
        User::where('id', $tutor_id)->update(['status' => $status]);
        return response()->json(['success' => 'Tutor Status Changed Successfully']);
    }
}
