<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Contract;
use App\Models\Submit;
use Illuminate\Http\Request;

class LookUpController extends Controller
{
    public function index() {
        return view('client.page.lookup.index');
    }

    public function onSearch(Request $request) {
        $customerId = $request['customer_id'];
        $submit = Submit::all()->where('customer_id', '=', $customerId)->first();
        //dd($submit);
        if($submit != null) {
            $contract = Contract::all()->find($submit->contract_id);
            if($contract != null) {
                return view('client.page.lookup.index',
                    [
                        'contract' => $contract
                    ]
                );
            }
            else {
                return view('client.page.lookup.index',
                    [
                        'error' => true,
                        'error_msg' => 'Hợp đồng chưa được tạo, cần phê duyệt trước'
                    ]
                );
            }
        } else {
            return view('client.page.lookup.index',
                [
                    'error' => true,
                    'error_msg' => 'Không tìm thấy'
                ]
            );
        }
    }
}
