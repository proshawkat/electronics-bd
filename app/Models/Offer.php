<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $fillable = [
        'product_id', 'min_qty', 'discount_type', 'discount_value', 'status'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
