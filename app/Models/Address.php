<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'customer_id', 'first_name', 'last_name', 'email', 'telephone',
        'company', 'address_1', 'address_2', 'city', 'zone_id'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function region()
    {
        return $this->belongsTo(Region::class, 'zone_id');
    }
}
