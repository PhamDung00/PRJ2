<!DOCTYPE html>
<html lang="en">
<head>
    @include('dashboard.components.head-items')
    <title>Dashboard | User list</title>
</head>

<body>
<!--  Body Wrapper -->
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
     data-sidebar-position="fixed" data-header-position="fixed">
    @include('dashboard.components.sidebar')
    <!--  Main wrapper -->
    <div class="body-wrapper">
        @include('dashboard.components.header')
        <div class="container-fluid">
            <div class="card shadow-lg">
                <div class="card-header bg-light-success d-flex justify-content-between align-items-center">
                    <span class="fs-5 text-success fw-bold">Create a new account</span>
                    <a class="btn btn-info" href="{{route('dashboard.users')}}">View all user</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('dashboard.users.store') }}" method="post">
                        @method('post')
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="username" id="" placeholder=" ">
                            <label for="">Username</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="password" id="" placeholder=" ">
                            <label for="">Password</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="name" id="" placeholder=" ">
                            <label for="">Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="title" id="" placeholder=" ">
                            <label for="">Title</label>
                        </div>
                        <button type="submit" class="btn btn-success w-50">Save</button>
                    </form>
                </div>
            </div>
        </div>
        @include('dashboard.components.footer')
    </div>
</div>
@include('dashboard.components.script')
</body>
</html>
