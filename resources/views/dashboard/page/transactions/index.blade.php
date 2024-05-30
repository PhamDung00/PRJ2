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
{{--                    <a class="btn btn-success" href="{{route('dashboard.users.create')}}">Add new</a>--}}
                    <span class="fs-5 text-white fw-bold">Table of transaction list</span>
                </div>
                <div class="card-body">
                    <!-- Table Start -->
                    <div class="table-responsive bg-light rounded-2">
                        <table class="table table-hover table-border">
                            <thead>
                                <tr>
                                    <th scope="col">Transaction number</th>
                                    <th scope="col">Customer</th>
                                    <th scope="col">Contract Number</th>
                                    <th scope="col">Paid</th>
                                    <th scope="col">Time</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($transactions as $transaction)
                                <tr>
                                    <th scope="row">{{ $transaction -> transaction_number }}</th>
                                    <td>{{ $transaction -> customer -> name }}</td>
                                    <td>{{ $transaction -> contract -> contract_number }}</td>
                                    <td>{{ $transaction -> total_amount }}</td>
                                    <td>{{ $transaction -> created_at }}</td>
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
