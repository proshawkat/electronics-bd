<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'customer_id', 'billing_address_id', 'total', 'return_status', 'status', 'shipping_address_id', 'order_code', 'payment_method','shipping_method', 'order_comment', 'owner_comment', 'payment_status', 'shipping_status'
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function billingAddress()
    {
        return $this->belongsTo(Address::class, 'billing_address_id');
    }
    
    public function shippingAddress()
    {
        return $this->belongsTo(Address::class, 'shipping_address_id');
    }

    protected static function booted()
    {
        static::creating(function ($order) {
            $order->order_code = now()->format('YmdH') . rand(100, 999);
        });
    }

    public function getCustomerEmailAttribute()
    {
        if ($this->customer_id && $this->customer) {
            return $this->customer->email;
        }

        if ($this->billingAddress) {
            return $this->billingAddress->email;
        }

        return null;
    }
}
