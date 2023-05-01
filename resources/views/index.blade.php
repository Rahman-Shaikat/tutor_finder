<!DOCTYPE html>
<html lang="en">

<head>
  <title>Tutors Point</title>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="/css/home.css">



</head>


<body>
  <section class="hero">
    <img class="bg-img" src="{{asset('images/back.jpg')}}" alt="">
    <!-- navbar here-->
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
              <a class="nav-link" href="#about">About</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="contact">Contact</a>
            </li>

          </ul>
          @if(!session()->get('loginId'))
          <a class="login_btn" href="{{route('login')}}">Login</a>
          @else
          @php $user = App\Models\User::findOrFail(session()->get('loginId')); @endphp
            @if(!empty($user))
              @if($user->is_tutor==0 && $user->is_admin==1)
                <a class="text-light" href="{{route('admin-dashboard')}}">{{$user->name}}</a>
              @elseif($user->is_tutor == 1 && !$user->is_admin)
                <a class="text-light" href="{{route('tutor-dashboard')}}">{{$user->name}}</a>
              @elseif($user->is_tutor == 0 && !$user->is_admin)
                <a class="text-light" href="{{route('student-dashboard')}}">{{$user->name}}</a>
              @endif
            @endif
          @endif
        </div>
      </div>
    </nav>
    <div class="container_2">
      <h2>Discover Expert Tutors for You !</h2>
      <p>Discover expert tutors for any subject, from math and science to language and music. 
        Our tutors are here to provide personalized instruction and guidance.
        Start achieving your academic goals!
      </p>
      <form action="{{route('registration')}}" method="get">
      @if(!session()->get('loginId'))
        <button type="submit" class="reg_btn" id="reg_btn">Register Today</button>
        @else
        @php $user = App\Models\User::findOrFail(session()->get('loginId')); @endphp
        <p class="text-light p-2 bg-success me-3">Hello, {{$user->name}}</p>
        @endif
      </form>
    </div>
  </section>


  <!-- <div id="myModal" class="modal">
  <div class="modal-content">
    <h2>Register as:</h2>
    <div class="options">
      <button id="studentBtn">Student</button>
      <button id="tutorBtn">Tutor</button>
    </div>
    <button id="close" class="close">Close</button>
  </div>
</div>-->

  <a id="about">
    <section class="more">
      <div class="heading">
        <h2>About Us</h2>
      </div>
      <img class="bg-img2" src="images/bg-img10.jpeg" alt="">
      <div class="container_3">
        <h2>WELCOME</h2>
        <p>We understand that every student is unique and has different learning styles and preferences.
          That's why we offer a range of tutoring options to choose from, including online and in-person tutoring.
          Our goal is to make tutoring accessible and convenient for everyone.</p>
      </div>
    </section>
  </a>





  <script src="/js/modal1.js"></script>
</body>

</html>