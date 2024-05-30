<?php

namespace App\Models\bak;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Resident extends Model
{
    use HasFactory;

    private mixed $id;
    private mixed $name;
    private mixed $phone_number;
    private mixed $contract_id;

    public function index(){
//        return DB::table('residents')
//            ->join('contracts','contracts.id','=','residents.contract_id')
//            ->select([
//                'contracts.*',
//                'residents.*'
//            ])
//            ->get();
    }

    public function store(): void
    {
        DB::table('residents')->insert(
            [
                'name'=>$this->name,
                'phone_number'=>$this->phone_number,
                'contract_id'=>$this->contract_id,
            ]
        );
    }

    public function modify(): void
    {
        DB::table('residents')->where('id', $this->id)->update(
            [
                'name'=>$this->name,
                'phone_number'=>$this->phone_number,
                'contract_id'=>$this->contract_id,
            ]
        );
    }

    public function remove(): void
    {
        DB::table('residents')->where('id', $this->id)->delete();
    }
}
