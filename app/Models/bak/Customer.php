<?php

namespace App\Models\bak;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Customer extends Model
{
    use HasFactory;

    private mixed $id;
    private mixed $email;
    private mixed $name;
    private mixed $date_of_birth;
    private mixed $phone_number;

    public function store(): void
    {
        DB::table('customers')->insert(
            [
                'email' => $this->email,
                'name' => $this->name,
                'date_of_birth' => $this->date_of_birth,
                'phone_number' => $this->phone_number
            ]
        );
    }

    public function modify(): void
    {
        DB::table('customers')->where('id', $this->id)->update(
            [
                'email' => $this->email,
                'name' => $this->name,
                'date_of_birth' => $this->date_of_birth,
                'phone_number' => $this->phone_number
            ]
        );
    }

    public function remove(): void
    {
        DB::table('customers')->where('id',$this->id)->delete();
    }
}
