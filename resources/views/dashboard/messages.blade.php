@extends('tutor-layouts.master')
@section('content')
<div class="container3 mt-5 w-90">
    <div class="row mb-2">
        <div class="col-md-12">
            <h3>Student Messages</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <tr>
                    <th>Profile Image</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Message</th>
                    <th>Action</th>
                </tr>
                @forelse($std_req as $std)
                <tr>
                    <td>@if(!empty($std->image))
                        <img src="{{asset($std->image)}}" alt="{{$std->user->name}}" class="rounded-circle" width="50">
                        @else
                        <img src="{{asset('images/def.jpeg')}}" alt="{{$std->user->name}}" class="rounded-circle" width="50">
                        @endif
                    </td>
                    <td>{{$std->user->name}}</td>
                    <td>{{$std->user->email}}</td>
                    <td>{{$std->user->phone}}</td>
                    <td>{{$std->message}}</td>
                    <td>
                       <a href="view-student-profile"><button class="btn btn-primary btn-sm">View</button></a>
                        <button class="btn btn-success btn-sm">Accept</button>
                        <button class="btn btn-danger btn-sm">Decline</button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4">No Data Found!</td>
                </tr>
                @endforelse
            </table>
        </div>
    </div>

</div>

@endsection