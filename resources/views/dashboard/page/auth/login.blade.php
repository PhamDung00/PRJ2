<!DOCTYPE html>
<html lang="en">
<head>
    @include('dashboard.components.head-items')
</head>

<body>
<!--  Body Wrapper -->
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
    <div class="position-relative overflow-hidden radial-gradient min-vh-100">
        <div class="position-relative z-index-5">
            <div class="row">
                <div class="col-xl-7 col-xxl-8">
                    <a href="{{route('dashboard')}}" class="text-nowrap logo-img d-block px-4 py-9 w-100">
                        <img src="{{asset('static/dashboard/assets/images/logos/dark-logo.svg')}}" width="180" alt="">
                    </a>
                    <div class="d-none d-xl-flex align-items-center justify-content-center" style="height: calc(100vh - 80px);">
                        <img src="{{asset('static/dashboard/assets/images/backgrounds/login-security.svg')}}" alt="" class="img-fluid" width="500">
                    </div>
                </div>
                <div class="col-xl-5 col-xxl-4">
                    <div class="authentication-login min-vh-100 bg-body row justify-content-center align-items-center p-4">
                        <div class="col-sm-8 col-md-6 col-xl-9">
                            <h2 class="mb-3 fs-7 fw-bolder">Welcome to Modernize</h2>
                            <p class=" mb-9">Vui lòng đăng nhập để xác thực</p>
                            @if(isset($res))
                                <div class="alert {{$res['status'] == 'error' ? 'alert-danger' : 'alert-success'}} alert-dismissible {{$res['status'] == 'error' ? 'bg-danger' : 'bg-success'}} text-white border-0 fade show" role="alert">
                                    <strong>Thông báo: </strong> {{$res['msg']}}
                                </div>
                            @endif
                            <form action="{{route('dashboard.auth.onLogin')}}" method="post">
                                @csrf
                                @method('post')
                                <div class="form-floating mb-2">
                                    <input type="text" class="form-control" name="username" id="" placeholder=" " required>
                                    <label for="" class="">Username</label>
                                </div>
                                <div class="form-floating mb-4">
                                    <input type="password" class="form-control" name="password" id="" placeholder=" " required>
                                    <label for="" class="">Password</label>
                                </div>
                                <button type="submit" class="btn btn-primary w-100 py-8 mb-4 rounded-2">Đăng nhập</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@include('dashboard.components.script')
</body>
</html>
