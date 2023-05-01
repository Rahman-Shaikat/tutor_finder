@extends('layouts.master')
@section('content')

<!-- /Breadcrumb -->

<div class="row gutters-sm">
  <div class="col-md-11 mb-3">
    <div class="card2">
      <div class="card-body2">
        <div class="d-flex flex-column align-items-center text-center">
          @if(!empty($student_data->image))
          <img src="{{asset($student_data->image)}}" alt="Admin" class="rounded-circle" width="150">
          @else
          <img src="{{asset('images/def.jpeg')}}" alt="Admin" class="rounded-circle" width="150">
          @endif
          <div class="mt-3">
            <h4>{{$student_data->name}}</h4>
            <p class="text-secondary mb-1">{{$student_data->thana_data->name}}, {{$student_data->district_data->name}}</p>
            <!-- <button class="btn btn-primary">Follow</button>
            <button class="btn btn-outline-primary">Message</button> -->
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-11">
    <div class="card2 mb-3">
      <div class="card-body2">
        <div class="row">
          <div class="col-sm-3">
            <h6 class="mb-0">Full Name</h6>
          </div>
          <div class="col-sm-9 text-secondary">
            {{$student_data->name}}
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-3">
            <h6 class="mb-0">Email</h6>
          </div>
          <div class="col-sm-9 text-secondary">
            {{$student_data->email}}
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-3">
            <h6 class="mb-0">Phone</h6>
          </div>
          <div class="col-sm-9 text-secondary">
            {{$student_data->phone}}
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-3">
            <h6 class="mb-0">Gender</h6>
          </div>
          <div class="col-sm-9 text-secondary">
            @if($student_data->gender == 1)
            Female
            @elseif($student_data->gender == 2)
            Male
            @elseif($student_data->gender == 3)
            Other
            @endif
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-3">
            <h6 class="mb-0">Address</h6>
          </div>
          <div class="col-sm-9 text-secondary">
            {{$student_data->address}}
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-3">
            <h6 class="mb-3">Medium</h6>
          </div>
          <div class="col-sm-9 text-secondary">
            @if($student_data->medium== 1)
            Bangla Medium
            @elseif($student_data->medium == 2)
            English Medium
            @elseif($student_data->medium == 3)
            English Version
            @endif
          </div>
        </div>
        <div class="row">
          <div class="col-sm-3">
            <h6 class="mb-3">Class</h6>
          </div>
          <div class="col-sm-9 text-secondary">
            @if($student_data->class== 1)
            Class 1
            @elseif($student_data->class== 2)
            Class 2
            @elseif($student_data->class == 3)
            Class 3
            @elseif($student_data->class== 4)
            Class 4
            @elseif($student_data->class == 5)
            Class 5
            @elseif($student_data->class == 6)
            Class 6
            @elseif($student_data->class== 7)
            Class 7
            @elseif($student_data->class == 8)
            Class 8
            @elseif($student_data->class == 9)
            Class 9
            @elseif($student_data->class== 10)
            Class 10
            @elseif($student_data->class == 11)
            Class 11
            @elseif($student_data->class == 12)
            Class 12
            @endif

          </div>
        </div>
        <div class="row">
          <div class="col-sm-3">
            <h6 class="mb-3">Institution</h6>
          </div>
          <div class="col-sm-9 text-secondary">
            {{$student_data->institution}}
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-12">
            <a class="btn btn-success" href="{{route('student-dashboard')}}">Edit</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection