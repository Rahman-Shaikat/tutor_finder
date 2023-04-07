@extends('layouts.master')
@section('content')

<nav class="navbar">
  <div class="container-fluid std-title">
    <a class="navbar-brand" href="{{route('student-dashboard')}}">Student Dashboard</a>
    <div class="profile-pic text-center">
      @if(!empty($student_data->image))
      <img class="animated rounded-circle" width="80" src="{{asset($student_data->image)}}" alt="{{$student_data->name}}">
      @else
      <img class="animated rounded-circle" width="80" src="{{asset('images/def.jpeg')}}" alt="{{$student_data->name}}">
      @endif
      <p class="mt-2 text-light">{{$student_data->name}}</p>
    </div>
  </div>
</nav>
<div class="container mt-5">
  <h1>Welcome to your Student Dashboard</h1>
  <p>Here you can view your progress, update your profile information, and adjust your settings.</p>
</div>
<div class="card">
  <div class="card-header">
    <h3 class="p-3 text-uppercase">Fillup The Form to find a Tutor</h3>
  </div>

  <div class="card-body p-md-5 text-black">
    @if(Session::has('success'))
    <div class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('success') }}</div>
    @endif
    @if(Session::has('fail'))
    <div class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('fail') }}</div>
    @endif

    <form action="{{route('student-profile-update')}}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="form-outline mb-4">
        <label class="form-label" for="name">Full Name*</label>
        <input type="text" id="name" name="name" class="form-control form-control-lg" placeholder="Your fullname here" value="{{$student_data->name}}">
        <span class="text-danger">@error('name') {{$message}} @enderror</span>
      </div>

      <div class="d-md-flex justify-content-start align-items-center mb-4 py-2">

        <h6 class="mb-0 me-4">Gender: </h6>

        <div class="form-check form-check-inline mb-0 me-4">
          <input class="form-check-input" type="radio" name="gender" id="femaleGender" value="1" {{$student_data->gender==1 ? 'checked' : ''}} />
          <label class="form-check-label" for="femaleGender">Female</label>
        </div>

        <div class="form-check form-check-inline mb-0 me-4">
          <input class="form-check-input" type="radio" name="gender" id="maleGender" value="2" {{$student_data->gender==2 ? 'checked' : ''}} />
          <label class="form-check-label" for="maleGender">Male</label>
        </div>

        <div class="form-check form-check-inline mb-0">
          <input class="form-check-input" type="radio" name="gender" id="otherGender" value="3" {{$student_data->gender==3 ? 'checked' : ''}} />
          <label class="form-check-label" for="otherGender">Other</label>
        </div>
        <span class="text-danger">@error('gender') {{$message}} @enderror</span>
      </div>


      <div class="row">
        <div class="col-md-6 mb-4">

          <select class="select form-control district_id" name="district">
            <option value="">Select District</option>
            @foreach($districts as $dis)
            <option value="{{$dis->id}}" {{$dis->id==$student_data->district ? 'selected': ''}}>{{$dis->name}}</option>
            @endforeach

          </select>
          <span class="text-danger">@error('district') {{$message}} @enderror</span>
        </div>
        <div class="col-md-6 mb-4">

          <select class="select form-control thana_id" name="area">
            @foreach($thanas_data as $thana)
            <option value="{{$thana->id}}" {{$thana->id==$student_data->area ? 'selected': ''}}>{{$thana->name}}</option>
            @endforeach
          </select>
          <span class="text-danger">@error('area') {{$message}} @enderror</span>
        </div>
      </div>

      <div class="form-outline mb-4">
        <label class="form-label" for="address">Detailed Address*</label>
        <input type="text" id="address" name="address" class="form-control form-control-lg" placeholder="e.g. House No:#, Road: " value="{{$student_data->address}}">
        <span class="text-danger">@error('address') {{$message}} @enderror</span>
      </div>



      <div class="form-outline mb-4">
        <label class="form-label" for="postcode">Postal Code*</label>
        <input type="text" id="postcode" name="postcode" class="form-control form-control-lg" value="{{$student_data->postcode}}">
        <span class="text-danger">@error('postcode') {{$message}} @enderror</span>
      </div>

      <div class="row">
        <div class="col-md-6 mb-4">

          <select class="select form-control" name="medium">
            <option value="1" {{$student_data->medium==1 ? 'selected' : ''}}>Medium</option>
            <option value="2" {{$student_data->medium==2 ? 'selected' : ''}}>Bangla Medium</option>
            <option value="3" {{$student_data->medium==3 ? 'selected' : ''}}>English Medium</option>
            <option value="4" {{$student_data->medium==4 ? 'selected' : ''}}>English Version</option>
          </select>
          <span class="text-danger">@error('medium') {{$message}} @enderror</span>

        </div>
        <div class="col-md-6 mb-4">

          <select class="select form-control" name="class">
            <option value="">--Select Class--<i class="fa-solid fa-angle-down"></i></option>
            <option value="1" {{$student_data->class==1 ? 'selected' : ''}}>Class 1</option>
            <option value="2" {{$student_data->class==2 ? 'selected' : ''}}>Class 2</option>
            <option value="3" {{$student_data->class==3 ? 'selected' : ''}}>Class 3</option>
            <option value="4" {{$student_data->class==4 ? 'selected' : ''}}>Class 4</option>
            <option value="5" {{$student_data->class==5 ? 'selected' : ''}}>Class 5</option>
            <option value="6" {{$student_data->class==6 ? 'selected' : ''}}>Class 6</option>
            <option value="7" {{$student_data->class==7 ? 'selected' : ''}}>Class 7</option>
            <option value="8" {{$student_data->class==8 ? 'selected' : ''}}>Class 8</option>
            <option value="9" {{$student_data->class==9 ? 'selected' : ''}}>Class 9</option>
            <option value="10" {{$student_data->class==10 ? 'selected' : ''}}>Class 10</option>
            <option value="11" {{$student_data->class==11 ? 'selected' : ''}}>Class 11</option>
            <option value="12" {{$student_data->class==12 ? 'selected' : ''}}>Class 12</option>
            <option value="13" {{$student_data->class==13 ? 'selected' : ''}}>SSC</option>
            <option value="14" {{$student_data->class==14 ? 'selected' : ''}}>HSC</option>
          </select>
          <span class="text-danger">@error('class') {{$message}} @enderror</span>

        </div>

      </div>

      <div class="form-outline mb-4">
        <label class="form-label" for="institution">Name of Institution*</label>
        <input type="text" id="institution" name="institution" class="form-control form-control-lg" placeholder="Your school / college name" value="{{$student_data->institution}}">
      </div>

      <div class="d-md-flex justify-content-start align-items-center mb-4 py-2">

        <h6 class="mb-0 me-4">Prefered Gender of Tutor*: </h6>

        <div class="form-check form-check-inline mb-0 me-4">
          <input class="form-check-input" type="radio" name="tutorgender" id="femaleGender" value="1" {{$student_data->tutorgender==1 ? 'checked' : ''}} />
          <label class="form-check-label" for="femaleGender">Female</label>
        </div>

        <div class="form-check form-check-inline mb-0 me-4">
          <input class="form-check-input" type="radio" name="tutorgender" id="maleGender" value="2" {{$student_data->tutorgender==2 ? 'checked' : ''}} />
          <label class="form-check-label" for="maleGender">Male</label>
        </div>

        <div class="form-check form-check-inline mb-0 me-4">
          <input class="form-check-input" type="radio" name="tutorgender" id="other" value="3" {{$student_data->tutorgender==3 ? 'checked' : ''}} />
          <label class="form-check-label" for="other">Anyone</label>
        </div>
        <span class="text-danger">@error('tutorgender') {{$message}} @enderror</span>
      </div>

      <div class="form-outline mb-4">
        <label class="form-label" for="image">Upload Image</label>
        <input class="form-control form-control-lg" name="image" id="image" type="file" />
        <div class="small text-muted mt-2">Upload your Image. Max file
          size 5 MB</div>
        <span class="text-danger">@error('image') {{$message}} @enderror</span>
      </div>

      <div class="d-flex justify-content-end pt-3">
        <button type="reset" class="btn btn-light btn-lg">Reset all</button>
        @if(!empty($student_data->name))
        <button type="submit" class="btn btn-success btn-lg ms-2">Update</button>
        @else
        <button type="submit" class="btn btn-success btn-lg ms-2">Submit</button>
        @endif
      </div>
    </form>
  </div>
</div>
@endsection