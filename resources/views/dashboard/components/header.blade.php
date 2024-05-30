<!--  Header Start -->
<header class="app-header border-bottom">
    <nav class="navbar navbar-expand-lg navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
                <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                    <i class="ti ti-menu-2"></i>
                </a>
            </li>
        </ul>
        <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                <li class="nav-item dropdown">
                    <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2"
                       data-bs-toggle="dropdown"
                       aria-expanded="false">
                        <img src="{{asset('static/dashboard/assets/images/profile/user-1.jpg')}}" alt="" width="35" height="35"
                             class="rounded-circle">
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up shadow-sm border border-dark p-0" style="min-width: 300px;"
                         aria-labelledby="drop2">
                        <div class="card m-0">
                           <div class="card-header bg-light-primary text-primary">
                               <h5>Thông tin tài khoản</h5>
                           </div>
                            <div class="card-body p-0">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <span>Xin chào, </span>
                                        <b>{{\Illuminate\Support\Facades\Auth::user()->title. ' ' .\Illuminate\Support\Facades\Auth::user()->name}}</b>
                                    </li>
                                    <li class="list-group-item">
                                        <span>Ngày tham gia: {{Auth::user()->created_at}}</span>
                                        <b></b>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-footer">
                                <a href="{{route('dashboard.auth.onLogout')}}" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>
<!--  Header End -->
