<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link p-1 pr-3" data-toggle="dropdown" href="#">
                <div class="image">
                    <img src="{{ asset(user()->photo) }}" style="width: 32px" class="img-circle elevation-2" alt="User Image">
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

                <div class="dropdown-divider"></div>
                <a href="{{ route("profile") }}" class="dropdown-item">
                    <i class="fas fa-user"></i>
                    <span>Profile</span>
                </a>

                <div class="dropdown-divider"></div>
                <a href="{{ route("logout") }}" class="dropdown-item bg-danger">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>

            </div>
        </li>
    </ul>
</nav>
