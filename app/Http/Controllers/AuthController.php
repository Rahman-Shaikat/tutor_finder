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

    public function tutorRegistration()
    {

        return view('tutor_registration');
    }

    public function studentDashboard()
    {
        $districts = District::all();
        return view('dashboard.student-dashboard', compact('districts'));
    }

  

    public function studentProfile()
    {
        return view(('dashboard.student-profile'));
    }

    public function registerUser(Request $request)
    {
        $request->validate([
            'joinas' => 'required',
            //'name' => 'required',
            //'gender' => 'required',
            //'address' => 'required',
            //'postcode' => 'required',
            //'class' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => [
                'required',
                'unique:users',
                'min:11',
                'max:11',
                'regex:/^(013|017|015|016|019|018)\d{8}$/'
            ],
            //'phone' => 'required|unique:users|min:11|max:11|regex:/^(013|017|015|016|019|018)\d{8}$/',
            'password' => 'required|min:8|max:12'
        ]);
        $user = new User();
        $user->is_tutor = $request->joinas;
        //$user->name=$request->name;
        //$user->gender=$request->gender;
        //$user->address=$request->address;
        //$user->postcode=$request->postcode;
        //$user->class=$request->class;
        $user->email = $request->email;
        $user->phone = $request->phone;
        //$user->password=$request->password;
        $user->password = Hash::make($request->password);
        //$user = User::find(auth()->user()->id);

        if ($request->joinas == 'tutor') {
            $user->is_tutor = true;
        } else {
            $user->is_tutor = false;
        }

        $result = $user->save();

        if ($result) {
            return back()->with('success', 'You have Successfully Registered.');
        } else {
            return back()->with('fail', 'Sorry Something went Wrong.');
        }
    }

    public function loginUser(Request $request)
    {



        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);



        $user = User::where('email', '=', $request->email)->first();
        //$request->merge(['joinas' => $user->is_tutor]);



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


    public function updateStudent(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'gender' => 'required',
            'district' => 'required',
            'area' => 'required',
            'address' => 'required|string|max:100',
            'postcode' => 'required|string|max:5',
            'medium' => 'required',
            'class' => 'required',
            'institution' => 'nullable|string|max:100',
            'tutorgender' => 'required',
        ]);
        $user =  User::findOrFail(session()->get('loginId'));

        $image = $request->file('image');
        if ($image != '') {
            $ext = pathinfo($image->getClientOriginalName(), PATHINFO_EXTENSION);
            $f_n = Str::slug(pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME), '-');
            $imagename = $f_n . '-' . time() . '.' . $ext;
            $image->move('uploads/students/images', $imagename);
            $user->cv = 'uploads/students/images/' . $imagename;
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
        $user->tutorgender = $request->tutorgender;
        $result = $user->update();



        if ($result) {
            return back()->with('success', 'Your inforamtion is updated Successfully.');
        } else {
            return back()->with('fail', 'Sorry Something went Wrong.');
        }
    }


    public function tutorDashboard()
    {
        $tutor_data = User::findOrFail(session()->get('loginId'));
        $districts = District::all();
        return view('dashboard.tutor-dashboard', compact('districts', 'tutor_data'));
    }
    public function updateTutor(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:100',
            'gender' => 'required',
            'district' => 'required',
            'area' => 'required',
            'address' => 'required|string|max:100',
            'postcode' => 'required|string|max:5',
            'medium' => 'required',
            'class' => 'required',
            'institution' => 'nullable|string|max:100',
            'cv' => 'required|mimes:pdf|max:5120',
        ]);
        $user =  User::findOrFail(session()->get('loginId'));

        $image = $request->file('image');
        if ($image != '') {
            $ext = pathinfo($image->getClientOriginalName(), PATHINFO_EXTENSION);
            $f_n = Str::slug(pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME), '-');
            $imagename = $f_n . '-' . time() . '.' . $ext;
            $image->move('uploads/students/images', $imagename);
            $user->image = 'uploads/students/images/' . $imagename;
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
}
