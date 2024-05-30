<!DOCTYPE html>
<html lang="en">
<head>
    @include('client.components.head-items')
    <title>Trang chu</title>
</head>
<body>
@include('client.components.loader')

@include('client.components.top-bar')
@include('client.components.navbar')

<section class="hero-wrap hero-wrap-2"
         style="background-image: url('{{asset('/static/client/assets/images/bg_2.jpg')}}')"
         data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs mb-2"><span class="mr-2"><a href="">Khách hàng <i
                                class="fa fa-chevron-right"></i></a></span></p>
                <h1 class="mb-0 bread">Tra cứu Hợp đồng</h1>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section bg-light ftco-no-pt ftco-no-pb">
    <div class="container p-2">
        <div class="card">
            <div class="card-header">
                <h3>Tra cứu HĐ theo mã KH</h3>
            </div>
            <div class="card-body">
                <form class="form" method="GET" action="{{route('client.lookup.get')}}">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <input type="text" class="form-control" name="customer_id" id="customer_id"
                                       placeholder="Nhập mã KH cần tra cứu" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary btn-block">Tìm kiếm</button>
                        </div>
                    </div>
                </form>
                @if(isset($error))
                    <div class="alert alert-danger">
                        {{$error_msg}}
                    </div>
                @endif
                @if(isset($contract) && $contract != null)
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 mb-2">
                                    <div class="form-floating">
                                        <input type="text" class="form-control"
                                               name="contract_number" id=""
                                               value="{{$contract->id}}"
                                               placeholder=" " readonly required="">
                                        <label for="">Số hợp đồng</label>
                                    </div>
                                </div>
                                <div class="col-sm-12 mb-2">
                                    <div class="form-floating">
                                        <input type="text" class="form-control"
                                               name="" id="" placeholder=" "
                                               value="{{$contract->motel->room_number}}"
                                               readonly required="">
                                        <label for="">Room number</label>
                                    </div>
                                </div>
                                <div class="col-sm-6 mb-2">
                                    <div class="form-floating">
                                        <input type="text" class="form-control"
                                               name="" id="" placeholder=" "
                                               value="{{$contract->customer->name}}"
                                               readonly required="">
                                        <label for="">Tên khách hàng</label>
                                    </div>
                                </div>
                                <div class="col-sm-6 mb-2">
                                    <div class="form-floating">
                                        <input type="date" class="form-control"
                                               name="" id="" placeholder=" "
                                               value="{{$contract->customer->dob}}"
                                               readonly required="">
                                        <label for="">Ngày sinh</label>
                                    </div>
                                </div>
                                <div class="col-sm-6 mb-2">
                                    <div class="form-floating">
                                        <input type="text" class="form-control"
                                               name="" id="" placeholder=" "
                                               value="{{$contract->customer->phone_number}}"
                                               readonly required="">
                                        <label for="">Số điện thoại</label>
                                    </div>
                                </div>
                                <div class="col-sm-6 mb-2">
                                    <div class="form-floating">
                                        <input type="email" class="form-control"
                                               name="" id="" placeholder=" "
                                               value="{{$contract->customer->email}}"
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
                                               value="{{$contract->end_date}}"
                                               placeholder=" " required="">
                                        <label for="">Ngày kết thúc</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

@include('client.components.footer')

@include('client.components.script')

</body>
</html>
