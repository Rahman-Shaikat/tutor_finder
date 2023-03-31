<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutor Dashboard</title>
    <!-- Bootstrap 5 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://kit.fontawesome.com/9e35b0d722.css" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/css/tutor_dashboard.css">
</head>
<body>
    <!-- Side Menu Bar -->
    <div class="side-menu">
        <ul class="nav flex-column">
            <li class="nav-item">
              <a href="student-dashboard">
                <i class="fa-light fa-table-columns"></i>
                <span class="nav-link active">Dashboard </span>
              </a>
            </li>

            <li class="nav-item">
              <a href="#"> 
              <i class="fa-light fa-user"></i>
                <span class="nav-link">Profile</span>
              </a>
            </li>

            <li class="nav-item">
              <a href="#">
                <i class="fa-light fa-gear"></i>
                <span class="nav-link" href="#">Students</span>
              </a>
            </li>

            <li class="nav-item">
              <a href="#">
                <i class="fa-light fa-gear"></i>
                <span class="nav-link" href="#">Requests</span>
              </a>
            </li>

            <li class="nav-item">
              <a href="#">
                <i class="fa-light fa-gear"></i>
                <span class="nav-link" href="#">Settings</span>
              </a>
            </li>
            
            <li class="nav-item">
            <a class="btn btn-danger" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
             @csrf
            </form>
                
            </li>
        </ul>
    </div>
    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Navigation -->
        <nav class="navbar">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Tutor Dashboard</a>
                
                <!-- Profile Picture Upload -->
                <div class="profile-pic text-center">
                    <img class="animated rounded-circle" width="80" src="{{asset($tutor_data->image)}}" alt="{{$tutor_data->name}}">
                    <p class="mt-2 text-light">{{$tutor_data->name}}</p>
                </div>
            </div>
        </nav>
        <!-- Main Content Area -->
        <div class="container mt-5">
            <h1>Welcome to your Tutor Dashboard</h1>
            <p>Here you can view your students, update your profile information, and adjust your settings.</p>
        </div>

        <div class="card">
        <div class="card-header">
        <h3 class="p-2 text-uppercase">Complete Your Profile to get tuition</h3>
        </div>

        <div class="card-body p-md-5 text-black">
        @if(Session::has('success'))
                  <div class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('success') }}</div>
                @endif
                @if(Session::has('fail'))
                  <div class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('fail') }}</div>
                @endif
                
                <form action="{{route('tutor-profile-update')}}" method="post" enctype="multipart/form-data">
                  @csrf
                <div class="form-outline mb-4">
                <label class="form-label" for="name">Full Name</label>
                  <input type="text" id="name" name="name" class="form-control form-control-lg" placeholder="Your fullname here" value="{{$tutor_data->name}}"/>
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
                

              <div class="row">
                  <div class="col-md-6 mb-4">

                  <select class="select form-control" name="district">
                  <option value="">Select District</option>
                      @foreach($districts as $dis)
                      <option value="{{$dis->id}}">{{$dis->name}}</option>
                      
                      @endforeach
                    
                    </select> 
                    <span class="text-danger">@error('district') {{$message}} @enderror</span>

                  </div>
                  <div class="col-md-6 mb-4">

                    <select class="select" name="area">
                      <option value="1">Area</option>
                      <option value="2">Option 1</option>
                      <option value="3">Option 2</option>
                      <option value="4">Option 3</option>
                    </select>
                    <span class="text-danger">@error('area') {{$message}} @enderror</span>
                  </div>
                </div> 
                
                <div class="form-outline mb-4">
                <label class="form-label" for="address">Detailed Address</label>
                  <input type="text" id="address" name="address" class="form-control form-control-lg" placeholder="e.g. House No:#, Road:" value="{{$tutor_data->address}}"/>
                  <span class="text-danger">@error('address') {{$message}} @enderror</span>
                </div>

               

                <div class="form-outline mb-4">
                <label class="form-label" for="postcode">Postal Code</label>
                  <input type="text" id="postcode" name="postcode" class="form-control form-control-lg" />
                  <span class="text-danger">@error('postcode') {{$message}} @enderror</span>
                </div>

                <div class="row">
                  <div class="col-md-6 mb-4" >

                    <select class="select" name="medium">
                      <option value="1">Prefered Medium</option>
                      <option value="2">Bangla Medium</option>
                      <option value="3">English Medium</option>
                      <option value="4">English Version</option>
                      <option value="4">Both</option>
                    </select> 
                    <span class="text-danger">@error('medium') {{$message}} @enderror</span>

                  </div>
                  <div class="col-md-6 mb-4" >

                    <select class="select" name="class">
                      <option value="1">Prefered Class</option>
                      <option value="2">Class 1</option>
                      <option value="3">Class 2</option>
                      <option value="4">Class 3</option>
                      <option value="4">Class 4</option>
                      <option value="4">Class 5</option>
                      <option value="4">Class 6</option>
                      <option value="4">Class 7</option>
                      <option value="4">Class 8</option>
                      <option value="4">Class 9</option>
                      <option value="4">Class 10</option>
                      <option value="4">Class 11</option>
                      <option value="4">Class 12</option>
                      <option value="4">SSC</option>
                      <option value="4">HSC</option>
                    </select>
                    <span class="text-danger">@error('class') {{$message}} @enderror</span>

                  </div>
                </div> 

                <div class="form-outline mb-4">
                <label class="form-label" for="class">Name of Your University</label>
                  <input type="text" id="institution" name="institution" class="form-control form-control-lg" placeholder="Your school / college name" value="{{$tutor_data->institution}}"/>
                  <span class="text-danger">@error('institution') {{$message}} @enderror</span>
                </div>
                
               <!-- <div class="d-md-flex justify-content-start align-items-center mb-4 py-2">

                  <h6 class="mb-0 me-4">Prefered Gender of Tutor: </h6>

                  <div class="form-check form-check-inline mb-0 me-4">
                    <input class="form-check-input" type="radio" name="tutorgender" id="femaleGender"
                      value="option1" />
                    <label class="form-check-label" for="femaleGender">Female</label>
                  </div>

                  <div class="form-check form-check-inline mb-0 me-4">
                    <input class="form-check-input" type="radio" name="tutorgender" id="maleGender"
                      value="option2" />
                    <label class="form-check-label" for="maleGender">Male</label>
                  </div>
                </div>-->

               <!-- <div class="form-outline mb-4">
                <label class="form-label" for="email">Email</label>
                  <input type="email" id="email" name="email" class="form-control form-control-lg" placeholder="example@gmail.com"/>
                  
                </div>

                <div class="form-outline mb-4">
                <label class="form-label" for="phone">Phone Number</label>
                  <input type="text" id="phone" name="phone" class="form-control form-control-lg" placeholder="01................."/>
                  
                </div>

                <div class="form-outline mb-4">
                <label class="form-label" for="password">Set Password</label>
                  <input type="password" id="password" name="password" class="form-control form-control-lg" />
                  
                </div>-->

                <div class="form-outline mb-4">
                <label class="form-label" for="image">Upload Image</label>
                <input class="form-control form-control-lg" name="image" id="image" type="file" />
                <div class="small text-muted mt-2">Upload your Image. Max file
                  size 5 MB</div>
                  <span class="text-danger">@error('image') {{$message}} @enderror</span>
                </div>

                <div class="form-outline mb-4">
                <label class="form-label" for="cv">Upload CV/Resume</label>
                <input class="form-control form-control-lg" name="cv" id="cv" type="file" />
                <div class="small text-muted mt-2">Upload your CV/Resume or any other relevant file. Max file
                  size 5 MB</div>
                  <span class="text-danger">@error('cv') {{$message}} @enderror</span>
                </div>


                <div class="d-flex justify-content-end pt-3">
                  <button type="reset" class="btn btn-light btn-lg">Reset all</button>
                  <button type="submit" class="btn btn-success btn-lg ms-2">Submit Form</button>
                </div>
                </form>
</div>
</div>
    </div>
    <script src="https://kit.fontawesome.com/d780b247ab.js" crossorigin="anonymous"></script>
    <!-- Bootstrap 5 JavaScript Bundle with Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JavaScript -->
    <script src="/js/studentdashboard.js"></script>
</body>
</html>
