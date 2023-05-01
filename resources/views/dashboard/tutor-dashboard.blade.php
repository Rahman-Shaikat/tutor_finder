@extends('tutor-layouts.master')
@section('content')
<!-- Side Menu Bar -->
<!-- Main Content -->
<!-- Top Navigation -->
<nav class="navbar">
  <div class="container-fluid tutor-title">
    <a class="navbar-brand" href="{{route('tutor-dashboard')}}">Tutor Dashboard</a>

    <!-- Profile Picture Upload -->
    <div class="profile-pic text-center">
      @if(!empty($tutor_data->image))
      <img class="animated rounded-circle" width="80" src="{{asset($tutor_data->image)}}" alt="{{$tutor_data->name}}">
      @else
      <img class="animated rounded-circle" width="80" src="{{asset('images/def.jpeg')}}" alt="{{$tutor_data->name}}">
      @endif
      <p class="mt-2 text-light">{{$tutor_data->name}}</p>
    </div>
  </div>
</nav>
<!-- Main Content Area -->
<div class="container mt-5 mb-2">
  <h1>Welcome to your Tutor Dashboard</h1>
  <p>Here you can view your students, update your profile information, and adjust your settings.</p>
</div>
@if($tutor_data->status==1)
<div class="text-center mt-4">
  <h5 class="text-success"><i class="fa-solid fa-circle-check"></i> Congrats! Your request has been approved.</h5>
</div>
@elseif($tutor_data->status==2)
<div class="text-center mt-4">
  <h5 class="text-danger"><i class="fa-solid fa-triangle-exclamation"></i> Your request is in queue. Complete your profile with valid information for admin approval.</h5>
</div>
@elseif($tutor_data->status==3)
<div class="text-center mt-4">
  <h5 class="text-danger"><i class="fa-solid fa-circle-xmark"></i> Your request has been declined. Complete your profile with valid information for admin approval.</h5>
</div>
@endif

<div class="card">
  <div class="card-header">
    <h3 class="p-2 text-uppercase">Complete Your Profile to get tuition</h3>
  </div>

  <div class="card-body p-md-5 text-black">
    @if(Session::has('success'))
    <div class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('success') }}</div>
    @endif
    @if(Session::has('fail'))
    <div class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('fail') }}</div>
    @endif

    <form action="{{route('tutor-profile-update')}}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="form-outline mb-4">
        <label class="form-label" for="name">Full Name <span class="text-danger">*</span></label>
        <input type="text" id="name" name="name" class="form-control form-control-lg" placeholder="Your fullname here" value="{{$tutor_data->name}}" />
        <span class="text-danger">@error('name') {{$message}} @enderror</span>
      </div>

      <div class="d-md-flex justify-content-start align-items-center mb-4 py-2">

        <h6 class="mb-0 me-4">Gender: <span class="text-danger">*</span></h6>

        <div class="form-check form-check-inline mb-0 me-4">
          <input class="form-check-input" type="radio" name="gender" id="femaleGender" value="1" {{$tutor_data->gender==1 ? 'checked' : ''}} />
          <label class="form-check-label" for="femaleGender">Female</label>
        </div>

        <div class="form-check form-check-inline mb-0 me-4">
          <input class="form-check-input" type="radio" name="gender" id="maleGender" value="2" {{$tutor_data->gender==2 ? 'checked' : ''}} />
          <label class="form-check-label" for="maleGender">Male</label>
        </div>

        <div class="form-check form-check-inline mb-0">
          <input class="form-check-input" type="radio" name="gender" id="otherGender" value="3" {{$tutor_data->gender==3 ? 'checked' : ''}} />
          <label class="form-check-label" for="otherGender">Other</label>
        </div>
        <span class="text-danger">@error('gender') {{$message}} @enderror</span>
      </div>


      <div class="row">
        <div class="col-md-6 mb-4">
          <label for="">District <span class="text-danger">*</span></label>
          <select class="select form-control district_id" name="district">
            <option value="">Select District </option>
            @foreach($districts as $dis)
            <option value="{{$dis->id}}" {{$dis->id==$tutor_data->district ? 'selected': ''}}>{{$dis->name}}</option>
            @endforeach
          </select>
          <span class="text-danger">@error('district') {{$message}} @enderror</span>
        </div>

        <div class="col-md-6 mb-4">
          <label for="">Area <span class="text-danger">*</span></label>
          <select class="select form-control thana_id" name="area">
            @foreach($thanas_data as $thana)
            <option value="{{$thana->id}}" {{$thana->id==$tutor_data->area ? 'selected': ''}}>{{$thana->name}}</option>
            @endforeach
          </select>
          <span class="text-danger">@error('area') {{$message}} @enderror</span>
        </div>
      </div>

      <div class="form-outline mb-4">
        <label class="form-label" for="address">Detailed Address <span class="text-danger">*</span></label>
        <input type="text" id="address" name="address" class="form-control form-control-lg" placeholder="e.g. House No:#, Road:" value="{{$tutor_data->address}}" />
        <span class="text-danger">@error('address') {{$message}} @enderror</span>
      </div>



      <div class="form-outline mb-4">
        <label class="form-label" for="postcode">Postal Code</label>
        <input type="text" id="postcode" name="postcode" class="form-control form-control-lg" value="{{$tutor_data->postcode}}" />
        <span class="text-danger">@error('postcode') {{$message}} @enderror</span>
      </div>

      <div class="row">
        <div class="col-md-6 mb-4">
          <label for="">Select Preferred Medium <span class="text-danger">*</span></label>
          <select class="select form-control" name="medium">
            <option value="">Prefered Medium</option>
            <option value="1" {{$tutor_data->medium==1 ? 'selected' : ''}}>Bangla Medium</option>
            <option value="2" {{$tutor_data->medium==2 ? 'selected' : ''}}>English Medium</option>
            <option value="3" {{$tutor_data->medium==3 ? 'selected' : ''}}>English Version</option>
            <option value="4" {{$tutor_data->medium==4 ? 'selected' : ''}}>Both</option>
          </select>
          <span class="text-danger">@error('medium') {{$message}} @enderror</span>

        </div>
        <div class="col-md-6 mb-4">
          <label for="">Select Preferred Class <span class="text-danger">*</span></label>
          <select class="select form-control" name="class">
            <option value="">Prefered Class</option>
            <option value="1" {{$tutor_data->class==1 ? 'selected' : ''}}>Class 1</option>
            <option value="2" {{$tutor_data->class==2 ? 'selected' : ''}}>Class 2</option>
            <option value="3" {{$tutor_data->class==3 ? 'selected' : ''}}>Class 3</option>
            <option value="4" {{$tutor_data->class==4 ? 'selected' : ''}}>Class 4</option>
            <option value="5" {{$tutor_data->class==5 ? 'selected' : ''}}>Class 5</option>
            <option value="6" {{$tutor_data->class==6 ? 'selected' : ''}}>Class 6</option>
            <option value="7" {{$tutor_data->class==7 ? 'selected' : ''}}>Class 7</option>
            <option value="8" {{$tutor_data->class==8 ? 'selected' : ''}}>Class 8</option>
            <option value="9" {{$tutor_data->class==9 ? 'selected' : ''}}>Class 9</option>
            <option value="10" {{$tutor_data->class==10 ? 'selected' : ''}}>Class 10</option>
            <option value="11" {{$tutor_data->class==11 ? 'selected' : ''}}>Class 11</option>
            <option value="12" {{$tutor_data->class==12 ? 'selected' : ''}}>Class 12</option>
          </select>
          <span class="text-danger">@error('class') {{$message}} @enderror</span>

        </div>
      </div>

      <div class="form-outline mb-4">
        <label class="form-label" for="class">Name of Your University <span class="text-danger">*</span></label>
        <input type="text" id="institution" name="institution" class="form-control form-control-lg" placeholder="Your university name" value="{{$tutor_data->institution}}" />
        <span class="text-danger">@error('institution') {{$message}} @enderror</span>
      </div>

      <div class="form-outline mb-4">
        <label class="form-label" for="image">Upload Image <span class="text-danger">*</span></label>
        <input class="form-control form-control-lg" name="image" id="image" type="file" />
        <div class="small text-muted mt-2">Upload your Image. Max file
          size 2 MB</div>
        <span class="text-danger">@error('image') {{$message}} @enderror</span>
      </div>

      <div class="form-outline mb-4">
        <label class="form-label" for="cv">Upload CV/Resume <span class="text-danger">*</span></label>
        <input class="form-control form-control-lg" name="cv" id="cv" type="file" />
        <div class="small text-muted mt-2">Upload your CV/Resume or any other relevant pdf file. Max file
          size 5 MB</div>
        <span class="text-danger">@error('cv') {{$message}} @enderror</span>
      </div>
      @php 
      $img_required =1;
        if(!empty($tutor_data->image)){
            $img_required = 0;
        }
        $cv_required =1;
        if(!empty($tutor_data->tutor_cv)){
            $cv_required = 0;
        }
      @endphp
      <input type="hidden" name="img_req" value="{{$img_required}}">
      <input type="hidden" name="cv_req" value="{{$cv_required}}">


      <div class="d-flex justify-content-end pt-3">
        <button type="reset" class="btn btn-light btn-lg">Reset all</button>
        @if(!empty($tutor_data->name))
        <button type="submit" class="btn btn-success btn-lg ms-2">Update</button>
        @else
        <button type="submit" class="btn btn-success btn-lg ms-2">Submit</button>
        @endif
      </div>
    </form>
  </div>
</div>
</div>
@endsection