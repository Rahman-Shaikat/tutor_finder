<div class="side-menu">
        <ul class="nav flex-column">
            <li class="nav-item">
              <a href="{{route('tutor-dashboard')}}">
                <span class="nav-link active"> <i class="fa-solid fa-table-columns"></i> Dashboard </span>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{route('tutor-profile')}}"> 
                <span class="nav-link"> <i class="fa-solid fa-user"></i> Profile </span>
              </a>
            </li>

            <li class="nav-item">
              <a href="#">
                <span class="nav-link" href="#"> <i class="fa-solid fa-people-group"></i> Students </span>
              </a>
            </li>

            <li class="nav-item">
              <a href="#">
                <span class="nav-link" href="#"><i class="fa-solid fa-bell"></i> Requests </span>
              </a>
            </li>

            <li class="nav-item">
              <a href="#">
                <span class="nav-link" href="#"> <i class="fa-solid fa-gear"></i> Settings</span>
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