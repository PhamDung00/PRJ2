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

<section class="hero-wrap hero-wrap-2" style="background-image: url('{{asset('/static/client/assets/images/bg_2.jpg')}}')"
         data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs mb-2"><span class="mr-2"><a href="">Trang chủ <i
                                class="fa fa-chevron-right"></i></a></span></p>
                <h1 class="mb-0 bread">Phòng cho thuê</h1>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section bg-light ftco-no-pt ftco-no-pb">
    <div class="container-fluid px-md-0">
        <div class="row no-gutters">
            @foreach($motels as $motel)
                <div class="col-lg-6">
                    <div class="room-wrap d-md-flex">
                        <a href="#" class="img {{(ceil($loop->iteration / 2)) % 2 == 0 ? 'order-md-last' : ''}}"
                           style="background-image: url('{{$motel->image_url}}')"></a>
                        <div class="half {{(ceil($loop->iteration / 2)) % 2 == 0 ? 'right-arrow' : 'left-arrow'}} d-flex align-items-center">
                            <div class="text p-4 p-xl-5 text-center">
                                <p class="mb-0"><span class="price mr-1">{{ number_format($motel -> price)}}</span> <span class="per">per month</span>
                                </p>
                                <h3 class="mb-3"><a href="#" style="text-transform: uppercase">{{$motel->room_number}}</a></h3>
                                <ul class="list-accomodation">
                                    @foreach(explode('\n', $motel->details) as $item)
                                        <li>{{$item}}</li>
                                    @endforeach
                                </ul>
                                <p class="pt-1"><a href="{{route('client.motels.detail', $motel->id)}}" class="btn-custom px-3 py-2">View Room Details
                                        <span class="icon-long-arrow-right"></span></a></p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

@include('client.components.footer')

@include('client.components.script')

</body>
</html>
