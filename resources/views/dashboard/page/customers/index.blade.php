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
{{--                    <a class="btn btn-success" href="{{route('dashboard.customers.create')}}">Add new</a>--}}
                    <span class="fs-5 text-white fw-bold">Table of customer list</span>
                </div>
                <div class="card-body">
                    <div class="table-responsive bg-light rounded-2">
                        <table class="table table-hover table-border">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Email</th>
                                <th scope="col">Name</th>
                                <th scope="col">Date of birth</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Operation</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($customers as $customer)
                                <tr>
                                    <th scope="row">{{ $customer -> id }}</th>
                                    <td>{{ $customer -> email }}</td>
                                    <td>{{ $customer-> name }}</td>
                                    <td>{{ $customer-> dob }}</td>
                                    <td>{{ $customer -> phone_number }}</td>
                                    <td style="" class="">
                                        <div class="btn-group-action">
                                            <a href="{{route('dashboard.customers.edit', $customer -> id)}}" id="btnUpdate" class="btn btn-sm btn-primary">
                                                <i class="ti ti-edit fs-5"></i>
                                            </a>
                                            <form method="post" action="{{route('dashboard.customers.destroy', $customer -> id)}}">
                                                <button type="submit" class="btn btn-sm btn-danger" >
                                                    <i class="ti ti-trash fs-5"></i>
                                                </button>
                                                @method('DELETE')
                                                @csrf
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @include('dashboard.components.footer')
    </div>
</div>
@include('dashboard.components.script')
</body>
</html>
