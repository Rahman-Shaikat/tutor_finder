<?php

namespace App\Http\Controllers;

use App\Models\District;
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
        $thanas_data='';
        $tutor_data = User::findOrFail(session()->get('loginId'));
        if(!empty ($tutor_data)){
            $thanas_data = Thana::where('district_id', $tutor_data->district)->get();
        }
        $districts = District::all();
        return view('dashboard.tutor-dashboard', compact('districts','tutor_data','thanas_data'));
    }

    public function tutorProfile(){
        $tutor_data = User::findOrFail(session()->get('loginId'));
        return view('dashboard.tutor-profile', compact('tutor_data'));
    }

    public function tutorList(Request $request){
        //dd($request->all());
        $query = User::query();
        if(!empty($request->class)){
            $query->where('class',$request->class);
        }
        if(!empty($request->district)){
            $query->where('district',$request->district);
        }
        if(!empty($request->area)){
            $query->where('area',$request->area);
        }
        $tutor_list = $query->where('is_tutor', 1)->where('status',1)->orderBy('id','desc')->paginate(12);
        //dd($tutor_list);
        // $student_data = User::findOrFail(session()->get('loginId'));
        $thanas_data='';
        $tutor_data = User::findOrFail(session()->get('loginId'));
        if(!empty ($tutor_data)){
            $thanas_data = Thana::where('district_id', $tutor_data->district)->get();
        }
        $districts = District::all();
         return view('dashboard.tutor-list' , compact('tutor_list', 'thanas_data', 'districts'));
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
            'image' => 'required|mimes:png,jpg,jpeg,webp|max:5120',
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
}
