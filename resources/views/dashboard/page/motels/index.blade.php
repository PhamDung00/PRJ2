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
                    <a class="btn btn-success" href="{{route('dashboard.motels.create')}}">Add new</a>
                    <span class="fs-5 text-white fw-bold">Table of motel list</span>
                </div>
                <div class="card-body">
                    <div class="table-responsive bg-light rounded-2">
                        <table class="table table-hover table-border">
                            <thead>
                            <tr>
                                <th scope="col">Room Number</th>
                                <th scope="col">Room Site</th>
                                <th scope="col">Room Type</th>
                                <th scope="col">Image</th>
                                <th scope="col">Price</th>
                                <th scope="col">Admin</th>
                                <th scope="col">Status</th>
                                <th scope="col">Operation</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($motels as $motel)
                                <tr>
                                    <th scope="row">{{ $motel -> room_number }}</th>
                                    <td>{{ $motel -> room_site }}</td>
                                    <td>{{ $motel -> room_type }}</td>
                                    <td><img style="height: 50px" src="{{ $motel -> image_url }}"/></td>
                                    <td>{{ number_format($motel -> price).'đ' }}</td>
                                    <td>{{ $motel -> user -> username }}</td>
                                    <td>
                                        <div class="btn-group-action">
                                            <span
                                                class="badge {{ ($motel->status == 'available') ? 'bg-primary' : ($motel->status == 'reserved' ? 'bg-warning' : 'bg-success') }} text-capitalize">{{ $motel -> status }}</span>
                                            @if($motel->status == 'occupied')
                                                <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                                                        data-bs-target="#modal_{{$motel->id}}">
                                                    <span class="" style="white-space: nowrap">View {{count($motel->residents)}} member</span>
                                                </button>
                                        </div>
                                            <div id="modal_{{$motel->id}}" class="modal fade" tabindex="-1"
                                                 aria-labelledby="success-header-modalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                                    <div class="modal-content">
                                                            <div class="modal-header px-4 bg-success text-white">
                                                                <h4 class="modal-title" id="success-header-modalLabel">
                                                                    <span class="text-white">Danh sách người trong phòng</span>
                                                                </h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="table-responsive bg-light rounded-2">
                                                                    <table class="table table-hover table-border">
                                                                        <thead>
                                                                            <tr>
                                                                                <th scope="col">ID</th>
                                                                                <th scope="col">Name</th>
                                                                                <th scope="col">Phone number</th>
                                                                                <th scope="col">Join at</th>
                                                                                <th scope="col">Operation</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                           @foreach($motel->residents as $resident)
                                                                               <tr>
                                                                                   <td>{{ $resident -> id }}</td>
                                                                                   <td>{{ $resident -> name }}</td>
                                                                                   <td>{{ $resident -> phone_number }}</td>
                                                                                   <td>{{ $resident -> created_at }}</td>
                                                                                   <td>
                                                                                       <form action="{{route('dashboard.residents.destroy', $resident->id)}}"
                                                                                             method="post">
                                                                                           @csrf
                                                                                           @method('delete')
                                                                                           <button class="btn btn-danger btn-sm fs-5" type="submit">
                                                                                               <i class="ti ti-trash"></i>
                                                                                           </button>
                                                                                       </form>
                                                                                   </td>
                                                                               </tr>
                                                                           @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-light"
                                                                        data-bs-dismiss="modal">
                                                                    Close
                                                                </button>
                                                            </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group-action">
                                            <a href="{{route('dashboard.motels.edit', $motel -> id)}}" id="btnUpdate"
                                               class="btn btn-sm btn-primary">
                                                <i class="ti ti-edit fs-5"></i>
                                            </a>
                                            @if(count($motel->residents) <= 0)
                                                <form method="post"
                                                      action="{{route('dashboard.motels.update', $motel -> id)}}">
                                                    @method('put')
                                                    @csrf
                                                    <input type="text" hidden="true" name="status" value="available">
                                                    <button type="submit" class="btn btn-sm btn-success">
                                                        <i class="ti ti-refresh fs-5"></i>
                                                    </button>
                                                </form>
                                                <form method="post"
                                                      action="{{route('dashboard.motels.destroy', $motel -> id)}}">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-danger"><i
                                                            class="ti ti-trash fs-5"></i></button>
                                                </form>
                                            @endif
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
