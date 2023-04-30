@extends('auth-layouts.master')
@section('content')

<section class="h-100 bg-dark">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
        <div class="card card-registration my-4">
          <div class="row g-0">
            <div class="col-xl-6 d-none d-xl-block">
              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/img4.webp" alt="Sample photo" class="img-fluid" style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;" />
            </div>

            <div class="col-xl-6">
              <div class="card-body p-md-5 text-black">
                <form action="{{route('register-user')}}" method="post">
                  @if(Session::has('success'))
                  <div class="alert {{ Session::get('alert-class', 'alert-info') }}"><i class="fa-regular fa-circle-check"></i> {{ Session::get('success') }}</div>
                  @endif
                  @if(Session::has('fail'))
                  <div class="alert {{ Session::get('alert-class', 'alert-info') }}"><i class="fa-solid fa-circle-exclamation"></i> {{ Session::get('fail') }}</div>
                  @endif
                  @csrf
                  <h3 class="mb-5 text-uppercase">User Registration form</h3>


                  <div class="d-md-flex justify-content-start align-items-center mb-4 py-2">

                    <h6 class="mb-0 me-4">Register as: </h6>

                    <div class="form-check form-check-inline mb-0 me-4">
                      <input class="form-check-input" type="radio" name="joinas" id="student" value="student" />
                      <label class="form-check-label" for="student">Student</label>
                    </div>

                    <div class="form-check form-check-inline mb-0 me-4">
                      <input class="form-check-input" type="radio" name="joinas" id="tutor" value="tutor" />
                      <label class="form-check-label" for="tutor">Tutor</label>
                    </div>
                    <span class="text-danger">@error('joinas') {{$message}} @enderror</span>
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control form-control-lg" value="{{old('email')}}" maxlength="100"/>
                    <span class="text-danger">@error('email') {{$message}} @enderror</span>
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="phone">Phone Number</label>
                    <input type="text" id="phone" name="phone" class="form-control form-control-lg" value="{{old('phone')}}" maxlength="11"/>
                    <span class="text-danger">@error('phone') {{$message}} @enderror</span>
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="password">Set Password</label>
                    <input type="password" name="password" id="password" class="form-control form-control-lg" maxlength="12"/>
                    <span class="text-danger">@error('password') {{$message}} @enderror</span>
                  </div>

                  <div class="d-flex justify-content-end pt-3">
                    <button type="reset" class="btn btn-light btn-lg">Reset all</button>
                    <button type="submit" class="btn btn-success btn-lg ms-2">Submit form</button>
                  </div>
                </form>


                <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="{{route('login')}}" class="fw-bold text-body"><u>Login here</u></a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


@endsection