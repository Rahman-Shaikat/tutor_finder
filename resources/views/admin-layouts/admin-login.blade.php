<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin Login</title>

  <!-- Custom fonts for this template-->
  <link href="{{asset('admin_assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <!-- Custom styles for this template-->
  <link href="{{asset('admin_assets/css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container mt-5">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-6 col-lg-6 col-md-6">

        <div class="card rounded o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-4">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <!-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> -->
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center mb-5">
                    <h1 class="h2 text-dark mb-4">TutorPoint Admin Login</h1>
                  </div>
                  <form class="user" method="POST" action="{{route('admin-login-submit')}}">
                    @csrf
                    <div class="form-group mb-5">
                      <input type="email" id="email" name="email" class="form-control  form-control-user" placeholder="Enter your email" value="{{old('email')}}" />
                      <span class="text-danger">@error('email') {{$message}} @enderror</span>
                    </div>
                    <div class="form-group mb-5">
                      <input type="password" id="password" name="password" class="form-control form-control-user" placeholder="Enter your password" value="{{old('password')}}" />
                      <span class="text-danger">@error('password') {{$message}} @enderror</span>
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                      Login
                    </button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>