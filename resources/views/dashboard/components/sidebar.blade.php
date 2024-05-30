<aside class="left-sidebar">
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="{{ route('dashboard') }}" class="text-nowrap logo-img">
                <img src="{{asset('static/dashboard/assets/images/logos/dark-logo.svg')}}" width="180" alt=""/>
            </a>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-8"></i>
            </div>
        </div>
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebar-nav">
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">SHORTCUT</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ $page_title == 'Create motel' ? 'active' : '' }}" href="{{ route('dashboard.motels.create') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-circle-plus"></i>
                        </span>
                        <span class="hide-menu">Add motel</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ $page_title == 'Approve' ? 'active' : '' }}" href="{{ route('dashboard.submits.approve') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-checklist"></i>
                        </span>
                        <span class="hide-menu">Approve</span>
                    </a>
                </li>
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">DASHBOARD CONTROL</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ $page_title == 'Dashboard' ? 'active' :''}}" href="{{ route('dashboard') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-layout-dashboard"></i>
                        </span>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ in_array($page_title, ['Create user', 'Users', 'Edit user']) ? 'active' : ''}}" href="{{ route('dashboard.users') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-user-check"></i>
                        </span>
                        <span class="hide-menu">Administrators</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ $page_title == 'Submit history' ? 'active' : '' }}" href="{{ route('dashboard.submits.logs') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-clock"></i>
                        </span>
                        <span class="hide-menu">Submit history</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ in_array($page_title, ['Create customer', 'Customers', 'Edit customer']) ? 'active' : '' }}" href="{{route('dashboard.customers')}}" aria-expanded="false">
                        <span>
                            <i class="ti ti-users"></i>
                        </span>
                        <span class="hide-menu">Customers</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ in_array($page_title, ['Create contract', 'Contracts', 'Edit contract']) ? 'active' : '' }}" href="{{route('dashboard.contracts')}}" aria-expanded="false">
                        <span>
                            <i class="ti ti-file-description"></i>
                        </span>
                        <span class="hide-menu">Contracts</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ in_array($page_title, ['Create resident', 'Residents', 'Edit resident']) ? 'active' : ''}}" href="{{route('dashboard.residents')}}" aria-expanded="false">
                        <span>
                            <i class="ti ti-cards"></i>
                        </span>
                        <span class="hide-menu">Residents</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ in_array($page_title, ['Create motel', 'Motels', 'Edit motel']) ? 'active' : '' }}" href="{{route('dashboard.motels')}}" aria-expanded="false">
                        <span>
                            <i class="ti ti-cards"></i>
                        </span>
                        <span class="hide-menu">Motels</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ ($page_title == 'Transactions') ? 'active' : '' }}" href="{{route('dashboard.transactions')}}" aria-expanded="false">
                        <span>
                            <i class="ti ti-cards"></i>
                        </span>
                        <span class="hide-menu">Transactions</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
