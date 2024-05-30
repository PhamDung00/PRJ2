<?php

namespace App\Models\bak;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class User extends Model
{
    use HasFactory;

    private mixed $id;
    private mixed $username;
    private mixed $password;
    private mixed $name;
    private mixed $title;

    public static function list(): Collection
    {
        return DB::table('users')->get();
    }

    public static function get ($id): Collection
    {
        return DB::table('users')->where()->get();
    }

    public function store(): void
    {
        DB::table('users')->insert(
            [
                'name' => $this->name,
                'username' => $this->username,
                'password' => $this->password,
                'title' => $this->title
            ]
        );
    }

    public function modify(): void
    {
        DB::table('users')->where('id',$this->id)->update(
            [
                'name' => $this->name,
                'username' => $this->username,
                'password' => $this->password,
                'title' => $this->title
            ]
        );
    }

    public function remove(): void
    {
        DB::table('users')->where('id',$this->id)->delete();
    }
}
