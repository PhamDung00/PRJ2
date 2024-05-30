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
                    <span class="fs-5 text-success fw-bold">Create a new resident</span>
                    <a class="btn btn-info" href="{{route('dashboard.residents')}}">View all resident</a>
                </div>
                <div class="card-body">
                    <!-- Form -->
                    <form action="{{ route('dashboard.residents.store') }}" method="post">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="name" id="" placeholder=" " required>
                                    <label for="">Name</label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="phone_number" id="" placeholder=" "
                                           required>
                                    <label for="">Phone number</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" name="motel_id" required>
                                @foreach($effect_contracts as $contract)
                                    @if($contract->motel->status == 'occupied')
                                        <option value="{{ $contract->motel->id }}">{{$contract->motel->room_number}}
                                            - {{$contract->customer->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                            <label for="">Room number</label>
                        </div>
                        @csrf
                        <button type="submit" class="btn btn-success w-50">Save</button>
                    </form>
                </div>
            </div>
        </div>
        @include('dashboard.components.footer')
    </div>
</div>
@include('dashboard.components.script')
</body>
</html>
