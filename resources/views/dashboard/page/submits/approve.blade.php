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
                    <span class="fs-5 text-white fw-bold">Approve</span>
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
                                <th scope="col">Operation</th>
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
                                        <span class="badge bg-warning text-capitalize">
                                            {{ $submit -> status }}
                                        </span>
                                    </td>
                                    <td>
                                        <!-- Button Sửa -->
                                        <div class="btn-group-action">
                                            <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal"
                                                    data-bs-target="#modal_{{$submit->id}}">
                                                <i class="ti ti-user-check fs-5"></i>
                                            </button>
                                            <div id="modal_{{$submit->id}}" class="modal fade" tabindex="-1"
                                                 aria-labelledby="success-header-modalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                                    <div class="modal-content">
                                                        <form method="post"
                                                              action="{{route('dashboard.submits.accept', $submit -> id)}}">
                                                            @method('put')
                                                            <div class="modal-header px-4 bg-success text-white">
                                                                <h4 class="modal-title" id="success-header-modalLabel">
                                                                    <span
                                                                        class="text-white">Xác nhận tạo hợp đồng</span>
                                                                </h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                @csrf
                                                                <div class="row">
                                                                    <input type="text" name="pending_id"
                                                                           value="{{$submit->id}}"
                                                                           hidden="true">
                                                                    <input type="text" name="motel_id"
                                                                           value="{{$submit->motel->id}}"
                                                                           hidden="true">
                                                                    <input type="text" name="customer_id"
                                                                           value="{{$submit->customer->id}}"
                                                                           hidden="true">
                                                                    <div class="col-sm-12 mb-2">
                                                                        <div class="form-floating">
                                                                            <input type="text" class="form-control"
                                                                                   name="contract_number" id=""
                                                                                   value="{{\Faker\Factory::create()->unique()->uuid()}}"
                                                                                   placeholder=" " readonly required="">
                                                                            <label for="">Số hợp đồng</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12 mb-2">
                                                                        <div class="form-floating">
                                                                            <input type="text" class="form-control"
                                                                                   name="" id="" placeholder=" "
                                                                                   value="{{$submit->motel->room_number}}"
                                                                                   readonly required="">
                                                                            <label for="">Room number</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6 mb-2">
                                                                        <div class="form-floating">
                                                                            <input type="text" class="form-control"
                                                                                   name="" id="" placeholder=" "
                                                                                   value="{{$submit->customer->name}}"
                                                                                   readonly required="">
                                                                            <label for="">Tên khách hàng</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6 mb-2">
                                                                        <div class="form-floating">
                                                                            <input type="date" class="form-control"
                                                                                   name="" id="" placeholder=" "
                                                                                   value="{{$submit->customer->dob}}"
                                                                                   readonly required="">
                                                                            <label for="">Ngày sinh</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6 mb-2">
                                                                        <div class="form-floating">
                                                                            <input type="text" class="form-control"
                                                                                   name="" id="" placeholder=" "
                                                                                   value="{{$submit->customer->phone_number}}"
                                                                                   readonly required="">
                                                                            <label for="">Số điện thoại</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6 mb-2">
                                                                        <div class="form-floating">
                                                                            <input type="email" class="form-control"
                                                                                   name="" id="" placeholder=" "
                                                                                   value="{{$submit->customer->email}}"
                                                                                   readonly required="">
                                                                            <label for="">Địa chỉ email</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6 mb-2">
                                                                        <div class="form-floating">
                                                                            <input type="date" class="form-control"
                                                                                   name="start_date" id=""
                                                                                   value="{{date('Y-m-d')}}"
                                                                                   placeholder=" " required="">
                                                                            <label for="">Ngày bắt đầu</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6 mb-2">
                                                                        <div class="form-floating">
                                                                            <input type="date" class="form-control"
                                                                                   name="end_date" id=""
                                                                                   value="{{$submit->motel->room_number}}"
                                                                                   min="{{date_format(date_add(date_create(), new DateInterval('P365D')), 'Y-m-d')}}"
                                                                                   placeholder=" " required="">
                                                                            <label for="">Ngày kết thúc</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="alert alert-success alert-dismissible bg-success text-white border-0 fade show"
                                                                    role="alert">
                                                                    <span class="fs-4">Tổng thanh toán:</span>
                                                                    <b class="fs-8">{{number_format($submit->motel->price). ' VND'}}</b>
                                                                    <hr>
                                                                    <p class="fs-4 fw-bold text-primary">
                                                                        Sau khi khách hàng đã thanh toán cho bạn, hãy
                                                                        nhấn "Tạo hợp đồng" để xác nhận.
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-light"
                                                                        data-bs-dismiss="modal">
                                                                    Hủy bỏ
                                                                </button>
                                                                <button type="submit"
                                                                        class="btn btn-success text-white font-medium">
                                                                    Tạo hợp đồng
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <form method="post"
                                                  action="{{route('dashboard.submits.reject', $submit -> id)}}">
                                                @method('put')
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="ti ti-user-off fs-5"></i>
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
