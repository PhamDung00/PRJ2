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
                    <a class="btn btn-success" href="{{route('dashboard.residents.create')}}">Add new</a>
                    <span class="fs-5 text-white fw-bold">Table of resident list</span>
                </div>
                <div class="card-body">
                    <div class="table-responsive bg-light rounded-2">
                        <table class="table table-hover table-border">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Room Number</th>
                                    <th scope="col">Created at - Updated at</th>
                                    <th scope="col">Operation</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($residents as $resident)
                                <tr>
                                    <th>{{ $resident -> name }}</th>
                                    <td>{{ $resident -> phone_number }}</td>
                                    <td>
                                        <span class="badge bg-light-primary text-dark" style="font-size: 24px">
                                            {{ $resident -> motel -> room_number }}
                                        </span>
                                    </td>
                                    <td>{{ $resident -> created_at }} - {{ $resident -> updated_at }}</td>
                                    <td>
                                        <div class="btn-group-action">
                                            <a class="btn btn-sm btn-success" href="{{route('dashboard.residents.edit', $resident->id)}}">
                                                <i class="ti ti-edit fs-5"></i>
                                            </a>
                                            <form action="{{route('dashboard.residents.destroy', $resident->id)}}"
                                                  method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger btn-sm" type="submit">
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
                </div>
            </div>
        </div>
        @include('dashboard.components.footer')
    </div>
</div>
@include('dashboard.components.script')
</body>
</html>
