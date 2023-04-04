<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Tutor Profile</title>
    <!-- Bootstrap 5 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://kit.fontawesome.com/9e35b0d722.css" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('/css/student_profile.css')}}">
    <link rel="stylesheet" href="{{asset('/css/tutor_dashboard.css')}}">
</head>

<body>
    <!-- Main Content -->
    <div class="main-content">
        <!-- /Breadcrumb -->

        <div class="row gutters-sm">
            <div class="col-md-10 mb-3">
                <div class="card2">
                    <div class="card-body2">
                        <div class="d-flex flex-column align-items-center text-center">
                            @if(!empty($tutor_data->image))
                            <img src="{{asset($tutor_data->image)}}" alt="Admin" class="rounded-circle" width="150">
                            @else
                            <img src="{{asset('images/def.jpeg')}}" alt="Admin" class="rounded-circle" width="150">
                            @endif
                            <div class="mt-3">
                                <h4>{{$tutor_data->name}}</h4>
                                <p class="text-secondary mb-1">{{$tutor_data->district_data->name}}</p>
                                <p class="text-muted font-size-sm">{{$tutor_data->thana_data->name}}</p>
                                <!-- <button class="btn btn-primary">Follow</button>
            <button class="btn btn-outline-primary">Message</button> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-10">
                <div class="card2 mb-3">
                    <div class="card-body2">
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Full Name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$tutor_data->name}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Email</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$tutor_data->email}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Phone</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$tutor_data->phone}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Gender</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                @if($tutor_data->gender == 1)
                                Female
                                @elseif($tutor_data->gender == 2)
                                Male
                                @elseif($tutor_data->gender == 3)
                                Other
                                @endif
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Address</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$tutor_data->address}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Medium</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                @if($tutor_data->medium== 1)
                                Bangla Medium
                                @elseif($tutor_data->medium == 2)
                                English Medium
                                @elseif($tutor_data->medium == 3)
                                English Version
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Class</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                @if($tutor_data->class== 1)
                                Class 1
                                @elseif($tutor_data->class== 2)
                                Class 2
                                @elseif($tutor_data->class == 3)
                                Class 3
                                @elseif($tutor_data->class== 4)
                                Class 4
                                @elseif($tutor_data->class == 5)
                                Class 5
                                @elseif($tutor_data->class == 6)
                                Class 6
                                @elseif($tutor_data->class== 7)
                                Class 7
                                @elseif($tutor_data->class == 8)
                                Class 8
                                @elseif($tutor_data->class == 9)
                                Class 9
                                @elseif($tutor_data->class== 10)
                                Class 10
                                @elseif($tutor_data->class == 11)
                                Class 11
                                @elseif($tutor_data->class == 12)
                                Class 12
                                @elseif($tutor_data->class== 13)
                                SSC
                                @elseif($tutor_data->class == 14)
                                HSC
                                @endif

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Institution</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$tutor_data->institution}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content Area -->
    </div>
    <script src="https://kit.fontawesome.com/d780b247ab.js" crossorigin="anonymous"></script>
    <!-- Bootstrap 5 JavaScript Bundle with Popper.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JavaScript -->
    <script src="{{asset('js/app.js')}}"></script>
</body>

</html>