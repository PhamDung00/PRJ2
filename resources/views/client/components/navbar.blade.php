<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{route('client')}}">CĂN HỘ MINI <span>SỐ 1 HÀ NỘI</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="fa fa-bars"></span> Menu
        </button>
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item {{!isset($motels) ? 'active' : ''}}"><a href="{{route('client')}}" class="nav-link">Trang chủ</a></li>
                <li class="nav-item {{isset($motels) ? 'active' : ''}}"><a href="{{route('client.motels')}}" class="nav-link">Phòng cho thuê</a></li>
                <li class="nav-item {{isset($motels) ? 'active' : ''}}"><a href="{{route('client.lookup')}}" class="nav-link">Tra cứu hợp đồng</a></li>
            </ul>
        </div>
    </div>
</nav>
