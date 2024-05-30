<?php

namespace App\Models\bak;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Transaction extends Model
{
    use HasFactory;

    private mixed $id;
    private mixed $transaction_number;
    private mixed $total_amount;
    private mixed $date_time;
    private mixed $customer_id;
    private mixed $contract_id;

    public function index(){
//        $transactions = DB::table('transactions')
//            ->join('contracts','contracts.id','=','transactions.contract_id')
//            ->join('customers','customers.id','=','transactions.cus_id')
//            ->select([
//                'contracts.*',
//                'customers.*',
//                'transactions.*'
//            ])
//            ->get();
//        return $transactions;
    }

    public function store(): void
    {
        DB::table('transactions')->insert(
            [
                'transaction_number'=>$this->transaction_number,
                'total_amount'=>$this->total_amount,
                'date_time'=>$this->date_time,
                'customer_id'=>$this->customer_id,
                'contract_id'=>$this->contract_id,
            ]
        );
    }

    public function modify(): void
    {
        DB::table('transactions')->where('id', $this->id)->update(
            [
                'transaction_number'=>$this->transaction_number,
                'total_amount'=>$this->total_amount,
                'date_time'=>$this->date_time,
                'customer_id'=>$this->customer_id,
                'contract_id'=>$this->contract_id,
            ]
        );
    }

    public function remove(): void
    {
        DB::table('transactions')->where('id', $this->id)->delete();
    }
}
