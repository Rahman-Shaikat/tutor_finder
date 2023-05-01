<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\StudentApplication;
use Illuminate\Http\Request;
use App\Models\Thana;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Session\Session;


class TutorController extends Controller
{
    public function tutorDashboard()
    {
        $thanas_data = '';
        $tutor_data = User::findOrFail(session()->get('loginId'));
        if (!empty($tutor_data)) {
            $thanas_data = Thana::where('district_id', $tutor_data->district)->get();
        }
        $districts = District::all();
        return view('dashboard.tutor-dashboard', compact('districts', 'tutor_data', 'thanas_data'));
    }

    public function tutorProfile()
    {
        $tutor_data = User::findOrFail(session()->get('loginId'));
        if(!empty($tutor_data) && $tutor_data->tutor_cv){
            return view('dashboard.tutor-profile', compact('tutor_data'));
        }
        return to_route('tutor-dashboard')->with('success', 'You must need to update information to view your profile!');
    }

    public function tutorList(Request $request)
    {
        //dd($request->all());
        $query = User::query();
        if (!empty($request->class)) {
            $query->where('class', $request->class);
        }
        if (!empty($request->district)) {
            $query->where('district', $request->district);
        }
        if (!empty($request->area)) {
            $query->where('area', $request->area);
        }
        $tutor_data = $query->where('is_tutor', 1)->where('status', 1)->orderBy('id', 'desc')->paginate(12);
        //dd($tutor_list);
        // $student_data = User::findOrFail(session()->get('loginId'));

        $thanas_data = Thana::all();
        $districts = District::all();
        return view('dashboard.tutor-list', compact('tutor_data', 'thanas_data', 'districts'));
    }

    public function updateTutor(Request $request)
    {
        $request->validate([
            'image' => 'required_if:img_req,1|mimes:png,jpg,jpeg,webp|max:2048',
            'name' => 'required|string|max:100',
            'gender' => 'required',
            'district' => 'required',
            'area' => 'required',
            'address' => 'required|string|max:100',
            'postcode' => 'required|string|max:5',
            'medium' => 'required',
            'class' => 'required',
            'institution' => 'nullable|string|max:100',
            'cv' => 'required_if:cv_req,1|mimes:pdf|max:5120',
        ]);
        $user =  User::findOrFail(session()->get('loginId'));

        $image = $request->file('image');
        if ($image != '') {
            $ext = pathinfo($image->getClientOriginalName(), PATHINFO_EXTENSION);
            $f_n = Str::slug(pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME), '-');
            $imagename = $f_n . '-' . time() . '.' . $ext;
            $image->move('uploads/tutors/images', $imagename);
            $user->image = 'uploads/tutors/images/' . $imagename;
        }

        $cv = $request->file('cv');
        if ($cv != '') {
            $ext = pathinfo($cv->getClientOriginalName(), PATHINFO_EXTENSION);
            $f_n = Str::slug(pathinfo($cv->getClientOriginalName(), PATHINFO_FILENAME), '-');
            $filename = $f_n . '-' . time() . '.' . $ext;
            $cv->move('uploads/tutors/cv', $filename);
            $user->tutor_cv = 'uploads/tutors/cv/' . $filename;
        }

        $user->name = $request->name;
        $user->gender = $request->gender;
        $user->district = $request->district;
        $user->area = $request->area;
        $user->address = $request->address;
        $user->postcode = $request->postcode;
        $user->medium = $request->medium;
        $user->class = $request->class;
        $user->institution = $request->institution;
        //$user->tutor_cv = $request->cv;


        $result = $user->update();



        if ($result) {
            return back()->with('success', 'Your inforamtion is updated Successfully.');
        } else {
            return back()->with('fail', 'Sorry Something went Wrong.');
        }
    }

    public function viewTutorProfile($tutor_id)
    {
        if (!empty(session()->get('loginId'))) {
            $tutor_data = User::findOrFail($tutor_id);
            $student_data = User::findOrFail(session()->get('loginId'));
            return view('view-tutor-profile', compact('tutor_data', 'student_data'));
        }
        return to_route('login')->with('profile_error', 'You must login to view tutor profile.');
    }

    public function studentMessage()
    {
        $tutor_data = User::findOrFail(session()->get('loginId'));
        $std_req = StudentApplication::where('tutor_id', session()->get('loginId'))->where('status', 2)->pluck('student_id');
        //dd($std_req);
        $std_info = User::whereIn('id', $std_req)->get();
        return view('dashboard.messages', compact('std_info'));
    }

    public function requestApproval(Request $request, $student_id)
    {
        // dd($request->all());
        $status = StudentApplication::where('student_id', $student_id)->where('tutor_id', session()->get('loginId'))->first();
        if (!empty($status)) {
            $msg = '';
            if ($request->accept == 1) {
                $status->status = 1;
                $msg = 'Student request accepted.';
            } elseif ($request->decline == 2) {
                $status->status = 3;
                $msg = 'Student request declined.';
            } else {
                abort(404);
            }
            $status->update();
            return to_route('messages')->with('success', $msg);
        }
        abort(404);
    }

    public function studentlist()
    {
        $tutor_data = User::findOrFail(session()->get('loginId'));
        $std_req = StudentApplication::where('tutor_id', session()->get('loginId'))->where('status', 1)->pluck('student_id');
        //dd($std_req);
        $std_info = User::whereIn('id', $std_req)->get();
        return view('dashboard.students', compact('std_info'));
    }
}
