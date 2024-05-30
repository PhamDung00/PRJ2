<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motel extends Model
{
    use HasFactory;

    protected $table = 'motels';

    protected $fillable = ['id', 'room_number', 'room_site', 'room_type', 'price', 'image_url', 'details', 'description', 'user_id', 'status', 'created_at', 'updated_at'];

    public $timestamps = true;

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function residents() {
        return $this->hasMany(Resident::class);
    }
}
