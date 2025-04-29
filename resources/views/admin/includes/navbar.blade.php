<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">
        <button class="btn btn-outline-secondary me-2" onclick="toggleSidebar()">
            <i class="fas fa-bars"></i>
        </button>
        <div class="ms-auto d-flex align-items-center">
            <button class="btn btn-outline-secondary me-2" onclick="toggleTheme()">
                <i class="fas fa-moon"></i>
            </button>
            <div class="dropdown">
                <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                    Admin
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li><a class="dropdown-item" href="#">Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>