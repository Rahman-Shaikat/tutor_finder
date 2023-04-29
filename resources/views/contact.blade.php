<!DOCTYPE html>
<html>

<head>
	<title>Contact</title>
	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
	<link rel="stylesheet" href="css/contact.css">
</head>

<body>
	<img class="bg-img" src="images/bg-8.jpeg" alt="">
	<nav class="navbar navbar-expand-lg navbar-dark">
		<div class="container">
			<a class="navbar-brand" href="home">Tutors Point</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ms-auto mb-2 mb-lg-0">
					<li class="nav-item">
						<a class="nav-link" href="{{route('tutor-list')}}">Find Tutors</a>
					</li>

					<li class="nav-item">
						<a class="nav-link" href="/#about">About</a>
					</li>

					<li class="nav-item">
						<a class="nav-link" href="contact">Contact</a>
					</li>

				</ul>

				<a class="login_btn" href="login">Login</a>

			</div>
		</div>
	</nav>

	<div class="container mt-5">
		<div class="row justify-content-center">
			<div class="col-lg-8">
				<form class="contact-form" action="{{route('contact-submit')}}" method="post">
					@csrf
					<h2>Let Us Know Anything</h2>
					<div class="show text-center w-100">@include('common.success')</div>
					<div class="form-group mb-4">
						<input type="text" class="form-control" id="name" name="name" maxlength="100" placeholder="Your Name" value="{{old('name')}}" required>
						<span class="text-danger">@error('name') {{$message}} @enderror</span>
					</div>

					<div class="form-group mb-4">
						<input type="email" class="form-control" id="email" name="email" maxlength="100" placeholder="Your Email" value="{{old('email')}}" required>
						<span class="text-danger">@error('email') {{$message}} @enderror</span>
					</div>

					<div class="form-group mb-4">
						<input type="text" class="form-control" id="number" name="phone_number" maxlength="11" placeholder="Your Phone Number" value="{{old('phone_number')}}" required>
						<span class="text-danger">@error('phone_number') {{$message}} @enderror</span>
					</div>

					<div class="form-group mb-4">
						<textarea class="form-control" id="message" name="message" rows="5" maxlength="1000" placeholder="Your Message.." required>{{old('message')}}</textarea>
						<span class="text-danger">@error('message') {{$message}} @enderror</span>
					</div>

					<div class="text-center">
						<button type="submit" class="btn btn-primary btn-lg">Send Message</button>
					</div>
					<!--<div class="success-message"></div>
                    <div class="error-message"></div>-->

				</form>

			</div>
		</div>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>