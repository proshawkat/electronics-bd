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

        if(isset($this->items[$productId])) {
            $this->items[$productId]['qty'] += $quantity;
        } else {
            $this->items[$productId] = [
                'id'    => $product->id,
                'name'  => $product->name,
                'image' => asset('public/'.$product->first_image_url),
                'price' => $product->sale_price,
                'discount_price' => $product->sale_price,
                'discount_percent' => intval($product->discount_percent ?? 0),
                'offer_applied'     => false,
                'model' => $product->model,
                'slug'  => $product->slug,
                'qty'   => $quantity
            ];
        }

        $totalQty = $this->items[$productId]['qty'];
        $this->items[$productId]['discount_price'] = $product->getPriceForQuantity($totalQty);
        $this->items[$productId]['offer_applied'] = ($product->discount_percent <= 0 && $product->getApplicableOffer($totalQty) !== null);
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
            $product = Product::find($productId);
            $qty = max(1, $quantity);
            $this->items[$productId]['qty'] = $qty;
            if ($product) {
                $this->items[$productId]['discount_price'] = $product->getPriceForQuantity($qty);
                $this->items[$productId]['offer_applied'] = ($product->discount_percent <= 0 && $product->getApplicableOffer($qty) !== null);
            }
        }
    }
}
