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
                <div class="card-header bg-light-success d-flex justify-content-between align-items-center">
                    <span class="fs-5 text-success fw-bold">Edit motel</span>
                    <a class="btn btn-info" href="{{route('dashboard.motels')}}">View all motel</a>
                </div>
                <div class="card-body">
                    <!-- Form -->
                    <form action="{{ route('dashboard.motels.update', $motel -> id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="room_number" id="" value="{{$motel -> room_number}}" placeholder=" " required>
                                    <label for="">Room number</label>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-floating ">
                                    <input type="text" class="form-control" name="room_site" id="" value="{{$motel -> room_site}}" placeholder=" " required>
                                    <label for="">Room site</label>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-floating mb-3">
                                    <select class="form-select" name="room_type" required>
                                        <option value="standard" {{$motel->room_type == 'standard' ? 'selected' : ''}}>Standard</option>
                                        <option value="luxury" {{$motel->room_type == 'luxury' ? 'selected' : ''}}>Luxury</option>
                                        <option value="superior" {{$motel->room_type == 'superior' ? 'selected' : ''}}>Superior</option>
                                    </select>
                                    <label for="">Room type</label>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-floating ">
                                    <input type="number" class="form-control" name="price" id="" value="{{$motel->price}}" placeholder=" " required>
                                    <label for="">Price</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Image</label>
                            <input type="file" accept="image/png, image/jpeg" class="form-control" name="image" id="" value="{{$motel -> image_url}}" placeholder=" " required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Details (per line)</label>
                            <textarea class="form-control" rows="5" name="details" id="" placeholder=" " required>{{$motel -> details}}</textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Description</label>
                            <textarea style="min-height: 120px" class="form-control" rows="10" name="description" id="" placeholder=" ">{{$motel -> description}}</textarea>
                        </div>
                        @csrf
                        <button type="submit" class="btn btn-success w-50">Save</button>
                    </form>
                    <!-- End Form -->
                </div>
            </div>
        </div>
        @include('dashboard.components.footer')
    </div>
</div>
@include('dashboard.components.script')
</body>
</html>
