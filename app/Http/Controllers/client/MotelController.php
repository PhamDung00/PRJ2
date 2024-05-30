<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Motel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MotelController extends Controller
{
    public function index() {
        return view('client.page.motels.index', ['page_title' => 'Danh sách phòng cho thuê', 'motels' => Motel::all()->where('status', '=', 'available')]);
    }

    public function detail($id) {
        $motel = Motel::all()->find($id);
        if($motel->status == 'occupied')
            return redirect()->route('client.motels');
        else
            return view('client.page.motels.detail', ['page_title' => 'Xem chi tiết phòng', 'motel' => $motel]);
    }
}
