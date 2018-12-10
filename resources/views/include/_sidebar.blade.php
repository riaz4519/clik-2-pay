<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <div class="nav-link">
                <div class="user-wrapper">
                    <div class="profile-image">
                        <img src="{{ asset('theme-style/assets/images/faces/face8.jpg') }}" alt="profile image"> </div>
                    <div class="text-wrapper">
                        <p class="profile-name">{{ Auth::user()->name }}</p>
                        <div>
                            <small class="designation text-muted">{{ strtoupper(Auth::user()->role->name) }}</small>
                            <span class="status-indicator online"></span>
                        </div>
                    </div>
                </div>
                <button class="btn btn-success btn-sm btn-block">Create client
                    <i class="mdi mdi-plus"></i>
                </button>
            </div>
        </li>


        <li class="nav-item">
            <a class="nav-link" href="pages/samples/widgets.html">
                <i class="menu-icon mdi mdi-file-document-box"></i>
                <span class="menu-title">Invoice</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="pages/samples/widgets.html">
                <i class="menu-icon mdi mdi-account-multiple"></i>
                <span class="menu-title">Clients</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#dashboard-dropdown" aria-expanded="false" aria-controls="dashboard-dropdown">
                <i class="menu-icon mdi mdi-account-star"></i>
                <span class="menu-title">Users</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="dashboard-dropdown">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('users.index') }}">All Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Create User</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user_group.index') }}">User Group</a>
                    </li>
                </ul>
            </div>
        </li>



        <li class="nav-item">
            <a class="nav-link" href="pages/ui-features/popups.html">
                <i class="menu-icon mdi mdi-chart-pie"></i>
                <span class="menu-title">Report</span>
            </a>
        </li>



    </ul>
</nav>