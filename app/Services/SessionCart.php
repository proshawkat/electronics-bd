<?php 

namespace App\Services;

class SessionCart
{
    protected $items = [];

    public function add($productId, $quantity = 1) {
        $product = \App\Models\Product::find($productId);
        if(!$product) return;

        if(isset($this->items[$productId])) {
            $this->items[$productId]['qty'] += $quantity;
        } else {
            $this->items[$productId] = [
                'id'    => $product->id,
                'name'  => $product->name,
                'image' => asset('public/'.$product->first_image_url),
                'price' => $product->sale_price,
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
        if (isset($this->items[$productId])) {
            $this->items[$productId]['qty'] = max(1, (int)$quantity);
        }
    }
}
