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
                @if(Auth::user()->role->accesses->where('access','create client')->count() > 0)
                <a href="{{ route('client.create') }}" class="btn btn-success btn-sm btn-block">Create client
                    <i class="mdi mdi-plus"></i>
                </a>
                    @endif
            </div>
        </li>


        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#dashboard-dropdown-invoice" aria-expanded="false" aria-controls="dashboard-dropdown-invoice">
                <i class="menu-icon mdi mdi-buffer"></i>
                <span class="menu-title">Invoice</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="dashboard-dropdown-invoice">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('invoice.index') }}">Invoice List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Pending Invoice</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Paid Invoice</a>
                    </li>

                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#dashboard-dropdown-clients" aria-expanded="false" aria-controls="dashboard-dropdown-clients">
                <i class="menu-icon mdi mdi-account-group"></i>
                <span class="menu-title">Clients</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="dashboard-dropdown-clients">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('client.create') }}">Create Client</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('client.show') }}">All Client</a>
                    </li>


                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#dashboard-dropdown-users" aria-expanded="false" aria-controls="dashboard-dropdown-users">
                <i class="menu-icon mdi mdi-account-star"></i>
                <span class="menu-title">Users</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="dashboard-dropdown-users">
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