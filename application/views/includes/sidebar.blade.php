

<!-- Sidebar -->
<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="https://ui-avatars.com/api/?name={{ auth()->name }}" alt="..." class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            {{ auth()->name }}
                            <span class="user-level">{{ ucwords(auth()->role) }}</span>
                            <span class="caret"></span>
                        </span>
                    </a>
                    <div class="clearfix"></div>

                    <div class="collapse in" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="{{ base_url('profile') }}">
                                    <span class="link-collapse">Edit Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ base_url('auth/logout') }}">
                                    <span class="link-collapse">Logout</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="nav nav-primary">
                <li class="nav-item">
                    <a href="{{ base_url('admin') }}">
                        <i class="fas fa-user-shield"></i>
                        <p>Admin</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ base_url('staff') }}">
                        <i class="fas fa-user-astronaut"></i>
                        <p>Staff</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ base_url('candidates') }}">
                        <i class="fas fa-user-friends"></i>
                        <p>Candidates</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ base_url('campus') }}">
                        <i class="fas fa-university"></i>
                        <p>Campus</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ base_url('departments') }}">
                        <i class="fas fa-school"></i>
                        <p>Departments</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ base_url('educationtypes') }}">
                        <i class="fas fa-book-reader"></i>
                        <p>Education Types</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ base_url('jobpost') }}">
                        <i class="fas fa-newspaper"></i>
                        <p>Post a Job</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->

<div class="main-panel">
    