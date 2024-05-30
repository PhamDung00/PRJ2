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
           <h1>Thống kê hệ thống</h1>
            <hr>
            <div class="row">
                <div class="col-md-4">
                    <div class="card bg-success">
                        <div class="card-header fs-4 text-white fw-bold">Motel</div>
                        <div class="card-body py-2">
                            <span class="fs-8 text-white">{{sizeof(\App\Models\Motel::all())}}</span>
                            <span class="fs-4 text-white">tổng số phòng</span>
                        </div>
                        <div class="card-footer">
                            <small class="text-white">Hiện đang có {{sizeof(\App\Models\Motel::all()->where('status', '=', 'available'))}} phòng trống</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-4"></div>
                <div class="col-md-4"></div>
            </div>
        </div>
        @include('dashboard.components.footer')
    </div>
</div>
@include('dashboard.components.script')
</body>
</html>
