@extends('tutor-layouts.master')
@section('content')
<div class="container3 mt-5 w-90">
    <div class="row mb-2">
        <div class="col-md-12">
            <h3>Student Requests</h3>
        </div>
    </div>
    @include('common.success')
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
                @forelse($std_info as $std)
                <tr>
                    <td>@if(!empty($std->image))
                        <img src="{{asset($std->image)}}" alt="{{$std->name}}" class="rounded-circle" width="50">
                        @else
                        <img src="{{asset('images/def.jpeg')}}" alt="{{$std->name}}" class="rounded-circle" width="50">
                        @endif
                    </td>
                    @php $msg=App\Models\StudentApplication::select('message')->where('student_id', $std->id)->where('tutor_id', session()->get('loginId'))->first() @endphp
                    <td>{{$std->name}}</td>
                    <td>{{$std->email}}</td>
                    <td>{{$std->phone}}</td>
                    <td>{{$msg->message}}</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="{{route('view-student-profile', $std->id)}}"> View</a><br>
                        <form action="{{route('request-approval', $std->id)}}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-success btn-sm"  value="1" name="accept">Accept</button><br>
                            <button type="submit" class="btn btn-danger btn-sm" value="2" name="decline">Decline</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td class="text-center p-3" colspan="5">No Data Found!</td>
                </tr>
                @endforelse
            </table>
        </div>
    </div>

</div>

@endsection