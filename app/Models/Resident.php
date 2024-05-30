<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resident extends Model
{
    use HasFactory;

    protected $table = 'residents';

    protected $fillable = ['id', 'name', 'phone_number', 'motel_id', 'created_at', 'updated_at'];

    public $timestamps = true;

    public function motel() {
        return $this->belongsTo(Motel::class);
    }
}
