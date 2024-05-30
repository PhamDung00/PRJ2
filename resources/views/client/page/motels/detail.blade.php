<!DOCTYPE html>
<html lang="en">
<head>
    @include('client.components.head-items')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Trang chu</title>
</head>
<body>
@include('client.components.loader')

@include('client.components.top-bar')
@include('client.components.navbar')

<!--BODY-->
<section class="ftco-section bg-light">
    <div class="container">
        <div class="row no-gutters shadow-lg">
            <div class="col-md-6">
                <div class="bg-white h-100">
                    <img class="w-100 h-100 d-block" src="{{$motel->image_url}}" alt="">
                </div>
            </div>
            <div class="col-md-6 py-4 px-4 bg-white border-bottom">
                <h2 class="font-weight-bold mb-4">
                    <span class="text-capitalize">
                        {{$motel->room_type}} room
                    </span>
                    <span> - #{{$motel->room_number}}</span>
                </h2>
                <div id="accordion">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0">
                                <button class="btn btn-secondary btn-block text-left" data-toggle="collapse"
                                        data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Thông tin chi tiết
                                </button>
                            </h5>
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                             data-parent="#accordion">
                            <div class="card-body">
                                {{$motel->details}}
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h5 class="mb-0">
                                <button class="btn btn-secondary btn-block text-left collapsed" data-toggle="collapse"
                                        data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Mô tả
                                </button>
                            </h5>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                            <div class="card-body">
                                {{$motel->description}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="wrapper">
                    <div class="row no-gutters">
                        <div class="col-lg-8 col-md-7 d-flex align-items-stretch">
                            <div class="contact-wrap w-100 p-md-5 p-4">
                                <h3 class="mb-4">Đăng ký nhận phòng</h3>
                                <div id="form-message-warning" class="mb-4"></div>
                                <div id="form-message-success" class="mb-4">
                                    Your message was sent, thank you!
                                </div>
                                <form method="POST" action="{{route('client.submits.send')}}">
                                    @method('post')
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="label" for="name">Name</label>
                                                <input type="text" class="form-control" name="name" id="name"
                                                       placeholder=" " required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="label" for="email">Date of birth</label>
                                                <input type="date" class="form-control" name="dob" id="dob"
                                                       placeholder=" " required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="label" for="subject">Phone number</label>
                                                <input type="text" class="form-control" name="phone_number"
                                                       id="phone_number"
                                                       placeholder=" " required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="label" for="email">Email</label>
                                                <input type="email" class="form-control" name="email" id="email"
                                                       placeholder=" ">
                                            </div>
                                        </div>
                                        <input type="text" name="motel_id" value="{{$motel->id}}" hidden="true">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-info btn-block">SUBMIT</button>
                                                <div class="submitting"></div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-5 d-flex align-items-stretch">
                            <div class="info-wrap bg-primary w-100 p-md-5 p-4">
                                <h3>Liên hệ trực tiếp</h3>
                                <p class="mb-4">We're open for any suggestion or just to have a chat</p>
                                <div class="dbox w-100 d-flex align-items-start">
                                    <div class="icon d-flex align-items-center justify-content-center">
                                        <span class="fa fa-map-marker"></span>
                                    </div>
                                    <div class="text pl-3">
                                        <p><span>Address:</span> 198 West 21th Street, Suite 721 New York NY 10016</p>
                                    </div>
                                </div>
                                <div class="dbox w-100 d-flex align-items-center">
                                    <div class="icon d-flex align-items-center justify-content-center">
                                        <span class="fa fa-phone"></span>
                                    </div>
                                    <div class="text pl-3">
                                        <p><span>Phone:</span> <a href="tel://1234567920">+ 1235 2355 98</a></p>
                                    </div>
                                </div>
                                <div class="dbox w-100 d-flex align-items-center">
                                    <div class="icon d-flex align-items-center justify-content-center">
                                        <span class="fa fa-paper-plane"></span>
                                    </div>
                                    <div class="text pl-3">
                                        <p><span>Email:</span> <a href="mailto:info@yoursite.com">info@yoursite.com</a>
                                        </p>
                                    </div>
                                </div>
                                <div class="dbox w-100 d-flex align-items-center">
                                    <div class="icon d-flex align-items-center justify-content-center">
                                        <span class="fa fa-globe"></span>
                                    </div>
                                    <div class="text pl-3">
                                        <p><span>Website</span> <a href="#">yoursite.com</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--END BODY-->
@include('client.components.footer')

@include('client.components.script')
@if(Session::has('error') && Session::get('error'))
    <script>
        swal({
            title: "Đăng ký dịch vụ thất bại",
            text: "{{ Session::get('msg')}}",
            icon: "error",
            button: "Tôi hiểu rồi!",
        });
        setTimeout(() => {
                location.href = "{{route('client.motels')}}"
            }, 30000
        )
    </script>
@endif
@if(Session::has('error') && !Session::get('error'))
    <script>
        swal({
            title: "Đăng ký dịch vụ thành công",
            text: "{{ Session::get('msg')}}",
            icon: "success",
            button: "Tôi hiểu rồi!",
        });
        setTimeout(() => {
            location.href = "{{route('client.motels')}}"
            }, 30000
        )
    </script>
@endif
</body>
</html>
