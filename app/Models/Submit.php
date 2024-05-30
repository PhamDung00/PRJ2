<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submit extends Model
{
    use HasFactory;

    protected $table = 'submits';

    protected $fillable = ['id', 'motel_id', 'customer_id', 'contract_id', 'status', 'created_at', 'updated_at'];

    public $timestamps = true;

    public function customer() {
        return $this->belongsTo(Customer::class);
    }

    public function motel() {
        return $this->belongsTo(Motel::class);
    }

    public function contract() {
        return $this->belongsTo(Contract::class);
    }
}
