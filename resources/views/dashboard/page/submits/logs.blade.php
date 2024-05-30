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
                <div class="card-header bg-primary d-flex justify-content-between align-items-center">
                    <span class="fs-5 text-white fw-bold">Submit history</span>
                </div>
                <div class="card-body">
                    <!-- Table Start -->
                    <div class="table-responsive bg-light rounded-2">
                        <table class="table table-hover table-border">
                            <thead>
                            <tr>
                                <th scope="col">Customer</th>
                                <th scope="col">Room number</th>
                                <th scope="col">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($submits as $submit)
                                <tr>
                                    <td>
                                        <div class="card">
                                            <div class="card-body">
                                                <ul class="d-flex flex-column gap-2">
                                                    <li>
                                                        <span>Họ tên: </span>
                                                        <span>{{$submit->customer->name}}</span>
                                                    </li>
                                                    <li>
                                                        <span>Ngày sinh: </span>
                                                        <span>{{$submit->customer->dob}}</span>
                                                    </li>
                                                    <li>
                                                        <span>Số điện thoại: </span>
                                                        <span>{{$submit->customer->phone_number}}</span>
                                                    </li>
                                                    <li>
                                                        <span>Email: </span>
                                                        <span>{{$submit->customer->email}}</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="fs-6">
                                        <span class="badge bg-light-primary text-dark" style="font-size: 24px">
                                            {{ $submit -> motel -> room_number }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge {{$submit -> status != 'accepted' ? 'bg-danger' : ' bg-success'}} text-capitalize">
                                            {{ $submit -> status }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- Table End -->
                </div>
            </div>
        </div>
        @include('dashboard.components.footer')
    </div>
</div>
@include('dashboard.components.script')
</body>
</html>
