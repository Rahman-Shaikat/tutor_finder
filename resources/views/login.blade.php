@extends('auth-layouts.master')
@section('content')

<section class="vh-100" style="background-color: #9A616D;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="images/bg-3.jpeg" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

                <form action="{{route('login-user')}}" method="post">
                  @if(Session::has('success'))
                  <div class="alert {{ Session::get('alert-class', 'alert-info') }}"><i class="fa-regular fa-circle-check"></i> {{ Session::get('success') }}</div>
                  @endif
                  @if(Session::has('fail'))
                  <div class="alert {{ Session::get('alert-class', 'alert-info') }}"><i class="fa-solid fa-circle-exclamation"></i> {{ Session::get('fail') }}</div>
                  @endif
                  @if(Session::has('profile_error'))
                  <div class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('profile_error') }}</div>
                  @endif
                  @csrf

                  <div class="d-flex align-items-center mb-3 pb-1">
                    <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                    <span class="h1 fw-bold mb-0">Tutor Point</span>
                  </div>

                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="email">Email address</label>
                    <input type="email" id="email" name="email" class="form-control form-control-lg" placeholder="Enter your email" value="{{old('email')}}" />
                    <span class="text-danger">@error('email') {{$message}} @enderror</span>
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control form-control-lg" placeholder="Enter your password" value="{{old('password')}}" />
                    <span class="text-danger">@error('password') {{$message}} @enderror</span>
                  </div>

                  <div class="pt-1 mb-4">
                    <button class="btn btn-dark btn-lg btn-block" type="submit">Login</button>
                  </div>

                  <!-- <a class="small text-muted" href="#!">Forgot password?</a> -->
                  <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="registration" style="color: #393f81;">Register here</a></p>
                  <!-- <a href="#!" class="small text-muted">Terms of use.</a>
                    <a href="#!" class="small text-muted">Privacy policy</a> -->
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


@endsection