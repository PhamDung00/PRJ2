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
                    <a class="btn btn-success" href="{{route('dashboard.users.create')}}">Add new account</a>
                    <span class="fs-5 text-white fw-bold">Table user list</span>
                </div>
                <div class="card-body">
                    <!-- Table Start -->
                    <div class="table-responsive bg-light rounded-2">
                        <table class="table table-border">
                            <thead class="text-dark fs-4 fw-semibold">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Username</th>
                                <th scope="col">Password</th>
                                <th scope="col">Name</th>
                                <th scope="col">Title</th>
                                <th scope="col">Operation</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <th scope="row">{{ $user -> id }}</th>
                                    <td>{{ $user -> username }}</td>
                                    <td>{{ $user -> password }}</td>
                                    <td>{{ $user -> name }}</td>
                                    <td>{{ $user -> title }}</td>
                                    <td style="" class="">
                                        <div class="btn-group-action">
                                            <a href="{{route('dashboard.users.edit', $user -> id)}}"
                                               id="btnUpdate" class="btn btn-sm btn-primary">
                                                <i class="ti ti-edit fs-5"></i>
                                            </a>
                                            <form method="post" action="{{route('dashboard.users.destroy', $user -> id)}}">
                                                @method('DELETE') @csrf
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="ti ti-trash fs-5"></i>
                                                </button>
                                            </form>
                                        </div>
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
