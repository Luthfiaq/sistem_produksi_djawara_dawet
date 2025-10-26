<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white shadow-sm px-4">
    <!-- Search -->
    <form class="d-none d-sm-inline-block form-inline mr-auto my-2 my-md-0 navbar-search">
        <div class="input-group">
            <input type="text" class="form-control border-0 small" placeholder="Cari sesuatu..." aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form>

    <!-- Right Side -->
    <ul class="navbar-nav ml-auto align-items-center">

        <!-- Notification Icon -->
        <li class="nav-item mx-2">
            <a class="nav-link" href="#">
                <i class="fas fa-bell fa-fw"></i>
                <span class="badge badge-danger badge-counter">3+</span>
            </a>
        </li>

        <!-- User Info -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userDropdown" role="button"
               data-bs-toggle="dropdown" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                <img class="img-profile rounded-circle" src="../img/profile.jpg" width="35" height="35" alt="User">
            </a>
            <!-- Dropdown -->
            <ul class="dropdown-menu dropdown-menu-end shadow animated--grow-in" aria-labelledby="userDropdown">
                <li><a class="dropdown-item" href="#"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i> Profile</a></li>
                <li><a class="dropdown-item" href="#"><i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i> Settings</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Logout</a></li>
            </ul>
        </li>
    </ul>
</nav>
<!-- End of Topbar -->
