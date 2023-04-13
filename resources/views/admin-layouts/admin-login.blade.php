@extends('auth-layouts.master')
@section('content')

<section class="vh-100" style="background-color: #9A616D;">
  <div class="container py-5 h-100">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-md-6">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-12 col-lg-7 align-items-center">
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

                  <div class="">
                    <!-- <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i> -->
                    <h1 class="h1 fw-bold mb-0">Tutor Point Admin</h1>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <input type="email" id="email" name="email" class="form-control form-control-lg" placeholder="Enter your email" value="{{old('email')}}" />
                      <span class="text-danger">@error('email') {{$message}} @enderror</span>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <input type="password" id="password" name="password" class="form-control form-control-lg" placeholder="Enter your password" value="{{old('password')}}" />
                      <span class="text-danger">@error('password') {{$message}} @enderror</span>
                    </div>
                  </div>

                  <div class="pt-1 mb-4">
                    <button class="btn btn-dark btn-lg btn-block" type="submit">Login</button>
                  </div>
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