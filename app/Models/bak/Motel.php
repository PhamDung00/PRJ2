<?php

namespace App\Models\bak;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Motel extends Model
{
    use HasFactory;

    private mixed $id;
    private mixed $room_number;
    private mixed $room_site;
    private mixed $user_id;

    public function index(){
//        return DB::table('motels')
//            ->join('admins','admins.id','=','motels.user_id')
//            ->select([
//                'admins.*',
//                'motels.*'
//            ])
//            ->get();
    }

    public function store(): void
    {
        DB::table('motels')->insert(
            [
                'room_number'=>$this->room_number,
                'room_site'=>$this->room_site,
                'user_id'=>$this->user_id
            ]
        );
    }

    public function modify(): void
    {
        DB::table('motels')->where('id', $this->id)->update(
            [
                'room_number'=>$this->room_number,
                'room_site'=>$this->room_site,
                'user_id'=>$this->user_id
            ]
        );
    }

    public function remove(): void
    {
        DB::table('motels')->where('id', $this->id)->delete();
    }
}
