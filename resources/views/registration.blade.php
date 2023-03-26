<!DOCTYPE html>
<html lang="en">
<head>
    <title>User Registration Form</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/register.css">
</head>

<body>
<section class="h-100 bg-dark">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
        <div class="card card-registration my-4">
          <div class="row g-0">
            <div class="col-xl-6 d-none d-xl-block">
              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/img4.webp"
                alt="Sample photo" class="img-fluid"
                style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;" />
            </div>

            <div class="col-xl-6">
              <div class="card-body p-md-5 text-black">
              <form action="{{route('register-user')}}" method="post">
              @if(Session::has('success'))
                  <div class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('success') }}</div>
                @endif
                @if(Session::has('fail'))
                  <div class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('fail') }}</div>
                @endif
              @csrf
                <h3 class="mb-5 text-uppercase">User Registration form</h3>
                <!--<div class="d-md-flex justify-content-start align-items-center mb-4 py-2">
                  <h6 class="mb-0 me-4">Apply as: </h6>

                  <div class="form-check form-check-inline mb-0 me-4">
                    <input class="form-check-input" type="radio" name="gender" id="femaleGender"
                      value="option1" />
                    <label class="form-check-label" for="femaleGender">Student</label>
                  </div>

                  <div class="form-check form-check-inline mb-0 me-4">
                    <input class="form-check-input" type="radio" name="gender" id="maleGender"
                      value="option2" />
                    <label class="form-check-label" for="maleGender">Tutor</label>
                  </div>-->
                <div class="form-outline mb-4">
                <label class="form-label" for="name">Full Name</label>
                  <input type="text" id="name" name="name" class="form-control form-control-lg" value="{{old('name')}}" />
                  <span class="text-danger">@error('name') {{$message}} @enderror</span>
                </div>


                <div class="d-md-flex justify-content-start align-items-center mb-4 py-2">
                  <h6 class="mb-0 me-4">Gender: </h6>

                  <div class="form-check form-check-inline mb-0 me-4">
                    <input class="form-check-input" type="radio" name="gender" id="femaleGender"
                      value="option1" />
                    <label class="form-check-label" for="femaleGender">Female</label>
                  </div>

                  <div class="form-check form-check-inline mb-0 me-4">
                    <input class="form-check-input" type="radio" name="gender" id="maleGender"
                      value="option2" />
                    <label class="form-check-label" for="maleGender">Male</label>
                  </div>

                  <div class="form-check form-check-inline mb-0">
                    <input class="form-check-input" type="radio" name="gender" id="otherGender"
                      value="option3" />
                    <label class="form-check-label" for="otherGender">Other</label>
                  </div>
                  <span class="text-danger">@error('gender') {{$message}} @enderror</span>
                  
                </div>

                <div class="form-outline mb-4">
                <label class="form-label" for="address">Address</label>
                  <input type="text" id="address" name="address" class="form-control form-control-lg" value="{{old('address')}}"/>
                  <span class="text-danger">@error('address') {{$message}} @enderror</span>
                </div>


                <div class="form-outline mb-4">
                <label class="form-label" for="postcode">Postal Code</label>
                  <input type="text" id="postcode" name="postcode" class="form-control form-control-lg" value="{{old('postcode')}}"/>
                 <span class="text-danger">@error('postcode') {{$message}} @enderror</span>
                </div>

                <div class="form-outline mb-4">
                <label class="form-label" for="class">Class</label>
                <input type="text" id="class" name="class" class="form-control form-control-lg" value="{{old('class')}}"/>
                <span class="text-danger">@error('class') {{$message}} @enderror</span>
                </div>

                <div class="form-outline mb-4">
                <label class="form-label" for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control form-control-lg" value="{{old('email')}}"/>
                <span class="text-danger">@error('email') {{$message}} @enderror</span>
                </div>

                <div class="form-outline mb-4">
                <label class="form-label" for="phone">Guardian's Phone Number</label>
                <input type="text" id="phone" name="phone" class="form-control form-control-lg" value="{{old('phone')}}"/>
                <span class="text-danger">@error('phone') {{$message}} @enderror</span>
                </div>

                <div class="form-outline mb-4">
                <label class="form-label" for="password">Set Password</label>
                <input type="password" name="password" id="password" class="form-control form-control-lg" />
                <span class="text-danger">@error('password') {{$message}} @enderror</span>
                </div>

                <div class="d-flex justify-content-end pt-3">
                  <button type="reset" class="btn btn-light btn-lg">Reset all</button>
                  <button type="submit" class="btn btn-success btn-lg ms-2">Submit form</button>
                </div>
                </form>
                

                <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="login"
                    class="fw-bold text-body"><u>Login here</u></a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>







<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
