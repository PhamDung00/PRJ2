<?php

namespace App\Models\bak;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Contract extends Model
{
    use HasFactory;

    private mixed $id;
    private mixed $contract_number;
    private mixed $start_time;
    private mixed $end_time;
    private mixed $motel_id;
    private mixed $customer_id;

    public function index(){
//        return DB::table('contracts')
//            ->join('motels','motels.id','=','contracts.motel_id')
//            ->join('customers','customers.id','=','contracts.cus_id')
//            ->select([
//                'contracts.*',
//                'motels.*',
//                'customers.*'
//            ])
//            ->get();
    }

    public function store(): void
    {
        DB::table('contracts')->insert(
            [
                'contract_number'=>$this->contract_number,
                'start_time'=>$this->start_time,
                'end_time'=>$this->end_time,
                'motel_id'=>$this->motel_id,
                'customer_id'=>$this->customer_id
            ]
        );
    }
}
