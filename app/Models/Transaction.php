<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transactions';

    protected $fillable = ['id', 'transaction_number', 'total_amount', 'customer_id', 'contract_id', 'created_at', 'updated_at'];

    public $timestamps = true;

    public function customer() {
        return $this->belongsTo(Customer::class);
    }

    public function contract() {
        return $this->belongsTo(Contract::class);
    }
}
