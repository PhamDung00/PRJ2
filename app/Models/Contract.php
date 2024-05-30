<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;

    protected $table = 'contracts';

    protected $fillable = ['id', 'contract_number', 'start_date', 'end_date', 'motel_id', 'customer_id', 'created_at', 'updated_at'];

    public $timestamps = true;

    public function customer() {
        return $this->belongsTo(Customer::class);
    }

    public function motel() {
        return $this->belongsTo(Motel::class);
    }
}
