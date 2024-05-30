<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Motel;
use App\Models\Submit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubmitController extends Controller
{
    public function onSubmit(Request $request)
    {
        if (Motel::all()->find($request['motel_id'])->status != 'available') {
            $msg = 'Phòng đã có người đặt trước đó rồi';
            return redirect()->route('client.motels.detail', $request['motel_id'])->with(['error' => true, 'msg' => $msg]);
        } else {
            $customerId = DB::table('customers')->insertGetId
            ([
                'name' => $request['name'],
                'dob' => $request['dob'],
                'phone_number' => $request['phone_number'],
                'email' => $request['email'],
                'created_at' => now(),
                'updated_at' => now()
            ]);

            DB::table('submits')->insert
            ([
                'motel_id' => $request['motel_id'],
                'customer_id' => $customerId,
                'contract_id' => null,
                'status' => 'pending',
                'created_at' => now(),
                'updated_at' => now()
            ]);

            Motel::all()->find($request['motel_id'])->update
            ([
                'status' => 'reserved',
                'updated_at' => now()
            ]);

            $msg = 'Đăng ký dịch vụ thành công! Vui lòng chờ đợi cho đến khi chúng tôi chủ động liên hệ bạn\n Mã KH của bạn là: <b>'.$customerId.'</b>\n Tra cứu trạng thái hợp đồng của bạn tại Menu - Tra cứu HĐ';
            return redirect()->route('client.motels.detail', $request['motel_id'])->with(['error' => false, 'msg' => $msg]);
        }
    }
}
