<!DOCTYPE html>
<html lang="en">
<head>
    @include('dashboard.components.head-items')
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
                    <span class="fs-5 text-success fw-bold">Create a new customer</span>
                    <a class="btn btn-info" href="{{route('dashboard.customers')}}">View all customer</a>
                </div>
                <div class="card-body">
                    <!-- Form -->
                    <form action="{{ route('dashboard.customers.store') }}" method="post">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="name" id="" placeholder=" ">
                            <label for="">Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" name="dob" id="" placeholder=" ">
                            <label for="">Date of birth</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="phone_number" id="" placeholder=" ">
                            <label for="">Phone number</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="email" id="" placeholder=" ">
                            <label for="">Email</label>
                        </div>
                        @csrf
                        <button type="submit" class="btn btn-success w-50">Save</button>
                    </form>
                    <!-- End Form -->
                </div>
            </div>
        </div>
        @include('dashboard.components.footer')
    </div>
</div>
@include('dashboard.components.script')
</body>
</html>
