<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Contract;
use App\Models\Customer;
use App\Models\Resident;
use App\Models\Submit;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubmitController extends Controller
{
    public function approve()
    {
        return view('dashboard.page.submits.approve',
            [
                'page_title' => 'Approve',
                'submits' => Submit::all()->where('status', '=', 'pending')
            ]);
    }

    public function logs()
    {
        return view('dashboard.page.submits.logs',
            [
                'page_title' => 'Submit history',
                'submits' => Submit::all()->where('status', '!=', 'pending')
            ]);
    }

    public function accept(Request $request,$id)
    {
        $submit = DB::table('submits')->where('id', '=', $id);
        $customer = DB::table('customers')->where('id', '=', $submit->first()->customer_id);
        $motel = DB::table('motels')->where('id', '=', $submit->first()->motel_id);

        $contractId = DB::table('contracts')->insertGetId
        ([
            'contract_number' => $request['contract_number'],
            'start_date' => $request['start_date'],
            'end_date' => $request['end_date'],
            'motel_id' => $request['motel_id'],
            'customer_id' => $request['customer_id'],
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('transactions')->insert
        ([
            'transaction_number' => uuid_create(),
            'total_amount' => $motel->first()->price,
            'customer_id' => $customer->first()->id,
            'contract_id' => $contractId,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('residents')->insert
        ([
            'name' => $customer->first()->name,
            'phone_number' => $customer->first()->phone_number,
            'motel_id' => $motel->first()->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('motels')->where('id', $motel->first()->id)->update
        ([
            'status' => 'occupied',
            'updated_at' => now()
        ]);

        DB::table('submits')->where('id', $submit->first()->id)->update
        ([
            'contract_id' => $contractId,
            'status' => 'accepted',
            'updated_at' => now()
        ]);

        return redirect()->route('dashboard.submits.approve');
    }

    public function reject($id)
    {
        DB::table('motels')->where('id', $id)->update
        ([
            'status' => 'available',
            'updated_at' => now()
        ]);

        DB::table('submits')->where('id', $id)->update
        ([
            'status' => 'rejected',
            'updated_at' => now()
        ]);

        return redirect()->route('dashboard.submits.approve');
    }
}
