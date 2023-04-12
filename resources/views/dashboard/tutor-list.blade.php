<!DOCTYPE html>
<html>

<head>
	<title>Tutor List</title>
	<!-- Bootstrap 5 CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
	<link rel="stylesheet" href="https://kit.fontawesome.com/9e35b0d722.css" crossorigin="anonymous">
	<link rel="stylesheet" href="{{asset('/css/tutor_list.css')}}">
</head>

<body>
	<div class="main-content">
		<div class="heading d-flex">
			@if(!empty(session('loginId')))
			<a class="p-3 text-light text-decoration-none" href="{{route('student-dashboard')}}"><i class="fa-solid fa-arrow-left"></i> Back </a>
			@else
			<a class="p-3 text-light text-decoration-none" href="{{route('home')}}"><i class="fa-solid fa-arrow-left"></i> Home </a>
			@endif
			<h1><i class="fa-solid fa-magnifying-glass text-dark"></i> Find All The Tutors Here. </h1>
		</div>
		<div class="inside">
			<div class="container mt-4">
				<form action="" method="GET">
					<div class="form-outline mb-4 row">
						<div class="col-md-3">
							<!-- <label for="class">Select Class:</label> -->
							<select id="class" class="form-control" name="class">
								<option value="">--Select Class-- <i class="fa-solid fa-angle-down"></i></option>
								<option value="1" {{request()->class==1 ? 'selected' : ''}}>Class 1</option>
								<option value="2" {{request()->class==2 ? 'selected' : ''}}>Class 2</option>
								<option value="3" {{request()->class==3 ? 'selected' : ''}}>Class 3</option>
								<option value="4" {{request()->class==4 ? 'selected' : ''}}>Class 4</option>
								<option value="5" {{request()->class==5 ? 'selected' : ''}}>Class 5</option>
								<option value="6" {{request()->class==6 ? 'selected' : ''}}>Class 6</option>
								<option value="7" {{request()->class==7 ? 'selected' : ''}}>Class 7</option>
								<option value="8" {{request()->class==8 ? 'selected' : ''}}>Class 8</option>
								<option value="9" {{request()->class==9 ? 'selected' : ''}}>Class 9</option>
								<option value="10" {{request()->class==10 ? 'selected' : ''}}>Class 10</option>
								<option value="11" {{request()->class==11 ? 'selected' : ''}}>Class 11</option>
								<option value="12" {{request()->class==12 ? 'selected' : ''}}>Class 12</option>
								<option value="13" {{request()->class==13 ? 'selected' : ''}}>SSC</option>
								<option value="14" {{request()->class==14 ? 'selected' : ''}}>HSC</option>
							</select>
						</div>

						<div class="col-md-3">
							<!-- <label for="district">Select District:</label> -->
							<select id="district" class="form-control district_id" name="district">
								<option value="">--Select District-- <i class="fa-solid fa-angle-down"></i></option>
								@foreach($districts as $dis)
								<option value="{{$dis->id}}" {{$dis->id==request()->district ? 'selected': ''}}>{{$dis->name}}</option>
								@endforeach
							</select>
						</div>

						<div class="col-md-3">
							<!-- <label for="area">Select Area:</label> -->
							<select id="area" class="form-control thana_id" name="area">
								<option value="">--Select Area-- <i class="fa-solid fa-angle-down"></i></option>
								<!-- @foreach($thanas_data as $thana)
								<option value="{{$thana->id}}" {{$thana->id==request()->area ? 'selected': ''}}>{{$thana->name}}</option>
								@endforeach -->
							</select>
						</div>
						<div class="col-md-3">
							<a class="reset-btn text-white" href="{{route('tutor-list')}}">Reset</a>
							<button type="submit">Filter</button>
						</div>
					</div>
				</form>
				@include('common.success')
			</div>

			<div class="container">
				<div class="row mt-5 mb-5">
					@foreach($tutor_data as $tutor)
					<div class="col-md-3">
						<div class="card" style="width: 18rem;">
							@if(!empty($tutor->image))
							<img src="{{asset($tutor->image)}}" alt="Admin" class="card-img-top" width="150">
							@else
							<img src="{{asset('images/def.jpeg')}}" alt="Admin" class="card-img-top" width="150">
							@endif

							<div class="card-body">
								<div class="name-info d-flex justify-content-between align-items-center">
									<h5 class="card-title">{{$tutor->name}}</h5>
									@if($tutor->gender == 1)
									<h5><i class="fa-solid fa-venus"></i></h5>
									@elseif($tutor->gender == 2)
									<h5><i class="fa-solid fa-mars"></i></h5>
									@elseif($tutor->gender == 3)
									<h5><i class="fa-solid fa-genderless"></i></h5>
									@endif
								</div>
								<p class="card-text">
								<div class="info">
									<p><a class="text-decoration-none" href="tel:{{$tutor->phone}}"><i class="fa-solid fa-phone me-2 text-success"></i> {{$tutor->phone}} </a></p>
									<p><i class="fa-solid fa-location-dot me-2 text-primary"></i> {{$tutor->thana_data->name}} , {{$tutor->district_data->name}} </p>
									<p><i class="fa-solid fa-graduation-cap me-2"></i> {{$tutor->institution}} </p>
								</div>
								</p>
								<div class="text-center">
									<a href="{{route('view-tutor-profile', $tutor->id)}}" class="btn btn-primary btn-sm w-100">View Profile</a>
								</div>
							</div>
						</div>
					</div>
					@endforeach
				</div>
				<div class="row">
					<div class="col-md-12">
						{{$tutor_data->links()}}
					</div>
				</div>
			</div>
		</div>
	</div>


	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.11/typed.min.js"></script>
	<script src="{{asset('/js/app.js')}}"></script>
</body>

</html>