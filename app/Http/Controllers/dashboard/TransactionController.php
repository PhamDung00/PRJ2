<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        return view('dashboard.page.transactions.index', ['transactions' => Transaction::all(), 'page_title' => 'Transactions']);
    }

//    public function store(Request $request)
//    {
//        DB::table('transactions')->insert
//        ([
//            'transaction_number' => $request['transaction_number'],
//            'total_amount' => $request['total_amount'],
//            'customer_id' => $request['customer_id'],
//            'contract_id' => $request['contract_id'],
//            'created_at' => now(),
//            'updated_at' => now(),
//        ]);
//    }
//
//    public function destroy($id)
//    {
//        //
//    }
}
