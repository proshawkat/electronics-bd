<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'product_code',
        'model',
        'description',
        'stock_status',
        'is_featured',
        'quantity',
        'sale_price',
        'original_price',
        'first_image_url',
        'second_image_url',
        'category_id',
        'sub_category_id',
        'brand_id',
        'status',
        'discount_percent',
        'is_clearance_outlet',
        'no_sale_price', 
    ];

    protected $casts = [
        'tag_id' => 'array',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function subCategory()
    {
        return $this->belongsTo(Category::class, 'sub_category_id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function galleries()
    {
        return $this->hasMany(ProductGallery::class);
    }

    public function getTagsAttribute()
    {
        return Tag::whereIn('id', $this->tag_id ?? [])->get();
    }

    public function getDiscountedPriceAttribute()
    {
        if ($this->discount_percent > 0) {
            $discount = ($this->sale_price * $this->discount_percent) / 100;
            return round($this->sale_price - $discount, 2);
        }
        return $this->sale_price;
    }
}
