@extends('layouts.master')
@section('content')

    <!-- /Breadcrumb -->

    <div class="row gutters-sm">
      <div class="col-md-11 mb-3">
        <div class="card">
          <div class="card-body">
            <div class="d-flex flex-column align-items-center text-center">
              <img src="{{asset($student_data->image)}}" alt="Admin" class="rounded-circle" width="150">
              <div class="mt-3">
                <h4>{{$student_data->name}}</h4>
                <p class="text-secondary mb-1">{{$student_data->district}}</p>
                <p class="text-muted font-size-sm">{{$student_data->area}}</p>
                <button class="btn btn-primary">Follow</button>
                <button class="btn btn-outline-primary">Message</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-11">
        <div class="card mb-3">
          <div class="card-body">
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
              {{$student_data->gender}}
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
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Medium</h6>
              </div>
              <div class="col-sm-9 text-secondary">
              {{$student_data->medium}}
              </div>
            </div>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Class</h6>
              </div>
              <div class="col-sm-9 text-secondary">
              {{$student_data->class}}
              </div>
            </div>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Institution</h6>
              </div>
              <div class="col-sm-9 text-secondary">
              {{$student_data->institution}}
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-12">
                <a class="btn btn-info " target="__blank" href="/student-dashboard">Edit</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection