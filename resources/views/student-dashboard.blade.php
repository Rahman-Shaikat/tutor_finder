<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <!-- Bootstrap 5 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/css/studentdashboard.css">
</head>
<body>
    <!-- Side Menu Bar -->
    <div class="side-menu">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="#">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Settings</a>
            </li>
            <li class="nav-item">
                <button class="btn btn-danger" id="logout-btn">Logout</button>
            </li>
        </ul>
    </div>
    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Navigation -->
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Student Dashboard</a>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
                <!-- Profile Picture Upload -->
                <div class="profile-pic">
                    <label for="profile-pic-upload" class="btn btn-primary">
                        <input type="file" id="profile-pic-upload" hidden>
                        Upload Profile Picture
                    </label>
                </div>
            </div>
        </nav>
        <!-- Main Content Area -->
        <div class="container mt-5">
            <h1>Welcome to your Student Dashboard</h1>
            <p>Here you can view your progress, update your profile information, and adjust your settings.</p>
        </div>
    </div>
    <!-- Bootstrap 5 JavaScript Bundle with Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JavaScript -->
    <script src="/js/studentdashboard.js"></script>
</body>
</html>
