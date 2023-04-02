<?php

namespace App\Http\Controllers;
use App\Models\District;
use Illuminate\Http\Request;
use App\Models\Thana;
use App\Models\User;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Session\Session;

class StudentController extends Controller
{
    public function studentDashboard()
    {
        $thanas_data='';
        $student_data = User::findOrFail(session()->get('loginId'));
        if(!empty ($student_data)){
            $thanas_data = Thana::where('district_id', $student_data->district)->get();
        }
        //dd($thanas_data);
        $districts = District::all();
        return view('dashboard.student-dashboard', compact('districts','student_data','thanas_data'));
    }

    public function studentProfile()
    {
        $student_data = User::findOrFail(session()->get('loginId'));

        return view('dashboard.student-profile', compact('student_data'));
    }

    public function updateStudent(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'image' => 'nullable|mimes:png,jpg,jpeg,webp|max:5120',
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
            $user->image = 'uploads/students/images/' . $imagename;
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
    public function getThana($districtID){
        $thana_id = Thana::where('district_id', $districtID)->get();
        return json_encode($thana_id);
    }

}
