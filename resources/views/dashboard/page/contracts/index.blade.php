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
{{--                    <a class="btn btn-success" href="{{route('dashboard.contracts.create')}}">Add new contracts</a>--}}
                    <span class="fs-5 text-white fw-bold">Table of contract list</span>
                </div>
                <div class="card-body">
                    <div class="table-responsive bg-light rounded-2">
                        <table class="table table-hover table-border">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Contract Number</th>
                                <th scope="col">Start time</th>
                                <th scope="col">End time</th>
                                <th scope="col">Room Number</th>
                                <th scope="col">Customer</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($contracts as $contract)
                                <tr>
                                    <th scope="row">{{ $contract -> id }}</th>
                                    <td>{{ $contract -> contract_number }}</td>
                                    <td>{{ $contract -> start_date }}</td>
                                    <td>{{ $contract -> end_date }}</td>
                                    <td>{{ $contract -> motel -> room_number }}</td>
                                    <td>{{ $contract -> customer -> name }}</td>
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
