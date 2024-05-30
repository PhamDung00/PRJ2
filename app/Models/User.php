<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';
    public $timestamps = true;

    protected $fillable = ['id', 'username', 'password', 'name', 'title', 'created_at', 'updated_at'];

    protected $hidden = ['password'];

    protected $casts = [
        'password' => 'hashed',
    ];
}
