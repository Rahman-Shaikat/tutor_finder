@extends('tutor-layouts.master')
@section('content')

<div class="container mt-5 w-90">
    <div class="row mb-2">
        <div class="col-md-12">
            <h3>Approved Tutor List</h3>
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
                    <th>Action</th>
                </tr>
                @forelse($tutor_req as $tutors)
                <tr>
                    <td>@if(!empty($tutors->image))
                        <img src="{{asset($tutors->image)}}" alt="{{$tutors->name}}" class="rounded-circle" width="50">
                        @else
                        <img src="{{asset('images/def.jpeg')}}" alt="{{$tutors->name}}" class="rounded-circle" width="50">
                        @endif
                    </td>
                    <td>{{$tutors->name}}</td>
                    <td>{{$tutors->email}}</td>
                    <td>{{$tutors->phone}}</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="{{route('view-tutor-profile', $tutors->id)}}"> View</a>
                        <a class="btn btn-disabled btn-sm text-success"><i class="fa-solid fa-circle-check"></i> Approved</a><br>
                        <!-- <form action="{{route('request-approval', $tutors->id)}}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-success btn-sm"  value="1" name="accept">Accept</button><br>
                            <button type="submit" class="btn btn-danger btn-sm" value="2" name="decline">Decline</button>
                        </form> -->
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