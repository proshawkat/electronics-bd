<?php 

namespace App\Services;
use App\Models\Product;
use App\Models\Offer;

class SessionCart
{
    public $items = [];

    public function add($productId, $quantity = 1) {
        $product = Product::find($productId);
        if(!$product) return;

        $discountPercent = $product->discount_percent ?? 0;
        $discountedPrice = $product->sale_price;
        $isOfferApplied   = false;
        if ($discountPercent > 0) {
            $discountedPrice = $product->sale_price - ($product->sale_price * $discountPercent / 100);
        }else {
            $offer = Offer::where('product_id', $product->id)->where('status', 1)->first();

            if ($offer && $quantity >= $offer->min_qty) {
                $isOfferApplied = true;
                if ($offer->discount_type === 'percent') {
                    $discountedPrice = 
                        $product->sale_price - ($product->sale_price * $offer->discount_value / 100);
                } else {
                    $discountedPrice = 
                        $product->sale_price - $offer->discount_value;
                }
            }
        }

        $discountedPrice = max(0, $discountedPrice);

        if(isset($this->items[$productId])) {
            $this->items[$productId]['qty'] += $quantity;
        } else {
            $this->items[$productId] = [
                'id'    => $product->id,
                'name'  => $product->name,
                'image' => asset('public/'.$product->first_image_url),
                'price' => $product->sale_price,
                'discount_price' => $discountedPrice,
                'discount_percent' => intval($discountPercent),
                'offer_applied'     => $isOfferApplied,
                'model' => $product->model,
                'slug'  => $product->slug,
                'qty'   => $quantity
            ];
        }
    }

    public function remove($productId) {
        if(isset($this->items[$productId])) {
            unset($this->items[$productId]);
        }
    }

    public function getItems() {
        return $this->items;
    }

    public function update($productId, $quantity) {
        $productId = (string) $productId;
        $quantity = (int) $quantity;
        if (isset($this->items[$productId])) {
            $this->items[$productId]['qty'] = max(1, (int)$quantity);
        }
    }
}
