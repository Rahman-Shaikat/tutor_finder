@extends('layouts.master')
@section('content')

<div class="container3 mt-5 w-90">
    <div class="row mb-2">
        <div class="col-md-12">
            <h3>Applied Tutor</h3>
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
                @forelse($applied as $std)
                <tr>
                    <td>@if(!empty($std->tutor->image))
                        <img src="{{asset($std->tutor->image)}}" alt="{{$std->tutor->name}}" class="rounded-circle" width="50">
                        @else
                        <img src="{{asset('images/def.jpeg')}}" alt="{{$std->tutor->name}}" class="rounded-circle" width="50">
                        @endif
                    </td>
                    <td>{{$std->tutor->name}}</td>
                    <td>{{$std->tutor->email}}</td>
                    <td>{{$std->tutor->phone}}</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="{{route('view-tutor-profile', $std->tutor->id)}}"> View</a>
                    <!-- <a class="btn btn-disabled btn-sm text-success"><i class="fa-solid fa-circle-check"></i> Approved</a><br> -->
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