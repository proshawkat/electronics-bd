<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReturnRequests extends Model
{
    protected $fillable = [
        'order_code', 'customer_id', 'comment', 'status'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
