<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Wishlist;
use App\Models\Compare;
use App\Models\Address;
use App\Models\Region;
use App\Models\City;
use App\Services\SessionCart;

class CartController extends Controller
{
    public function action(Request $request){
        if($request->action_type == 'cart'){
            return  $this->addToCart($request);
        }else if($request->action_type == 'buy_now'){
            return $this->BuyNow($request);
        }else if($request->action_type == 'wishlist'){
            return $this->AddToWishlist($request);
        }else if($request->action_type == 'compare'){
            return $this->AddToCompare($request);
        }
        return response()->json(['status' => 'error', 'message' => 'Invalid action']);
    }

    public function addToCart($request)
    {
        $productId = $request->product_id;
        $quantity = $request->quantity ?? 1;
        $product = Product::find($productId);

        if (!$product || $product->quantity <= 0 || !$product->stock_status) {
            return response()->json([
                'status'  => 'error',
                'message' => 'This product is out of stock.',
            ]);
        }

        if (Auth::guard('customer')->check()) {
            $cart = Cart::firstOrCreate(['customer_id' => auth('customer')->id()]);
            $cartItem = CartItem::where('cart_id', $cart->id)->where('product_id', $productId)->first();

            if ($cartItem) {
                $cartItem->quantity += $quantity;
                $cartItem->save();
            } else {
                CartItem::create([
                    'cart_id'    => $cart->id,
                    'product_id' => $productId,
                    'quantity'   => $quantity,
                ]);
            }
        } else {
            $sessionCart = session()->get('cart', new SessionCart());
            $sessionCart->add($productId, $quantity);
            session()->put('cart', $sessionCart);
        }


        return response()->json([
            'status'  => 'success',
            'message' => 'Added to cart',
            'product' => [
                'id'    => $product->id,
                'name'  => $product->name,
                'image' => 'public/'.$product->first_image_url, 
                'url'   => url('/product/'.$product->slug),
                'qty'   => $quantity
            ]
        ]);
    }

    public function buyNow($request)
    {
        $productId = $request->product_id;
        $quantity = $request->quantity ?? 1;
        $product = Product::find($productId);

        if (!$product || $product->quantity <= 0 || !$product->stock_status) {
            return response()->json([
                'status'  => 'error',
                'message' => 'This product is out of stock.',
            ]);
        }

        if (Auth::guard('customer')->check()) {
            $cart = Cart::firstOrCreate(['customer_id' => auth('customer')->id()]);
            $cartItem = CartItem::where('cart_id', $cart->id)->where('product_id', $productId)->first();

            if ($cartItem) {
                $cartItem->quantity += $quantity;
                $cartItem->save();
            } else {
                CartItem::create([
                    'cart_id'    => $cart->id,
                    'product_id' => $productId,
                    'quantity'   => $quantity,
                ]);
            }
        } else {
            $sessionCart = session()->get('cart', new SessionCart());
            $sessionCart->add($productId, $quantity);
            session()->put('cart', $sessionCart);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Proceed to checkout',
            'product_id' => $request->product_id,
            'quantity' => $request->quantity ?? 1
        ]);
    }

    public function addToWishlist($request)
    {
        if (Auth::guard('customer')->check()) {
            Wishlist::firstOrCreate([
                'customer_id' => auth('customer')->id(),
                'product_id'  => $request->product_id
            ]);
        } else {
            $wishlist = session()->get('wishlist', []);
            $wishlist[] = $request->product_id;
            session()->put('wishlist', $wishlist);
        }

        $product = Product::find($request->product_id);

        return response()->json([
            'status'  => 'success',
            'message' => 'Added to wishlist',
            'product' => [
                'id'    => $product->id,
                'name'  => $product->name,
                'image' => 'public/'.$product->first_image_url,
                'url'   => url('/product/'.$product->slug),
            ]
        ]);
    }


    public function addToCompare($request)
    {
        if (Auth::guard('customer')->check()) {
            Compare::firstOrCreate([
                'customer_id' => auth('customer')->id(),
                'product_id'  => $request->product_id
            ]);
        } else {
            $compare = session()->get('compare', []);
            $compare[] = $request->product_id;
            session()->put('compare', $compare);
        }

        $product = Product::find($request->product_id);

        return response()->json([
            'status'  => 'success',
            'message' => 'Added to compare list',
            'product' => [
                'id'    => $product->id,
                'name'  => $product->name,
                'image' => 'public/'.$product->first_image_url,
                'url'   => url('/product/'.$product->slug),
            ]
        ]);
    }

    public function getCart(Request $request)
    {
        $cartItems = [];
        $totalPrice = 0;
        $totalQty = 0;

        if (Auth::guard('customer')->check()) {
            $cart = Cart::firstOrCreate(['customer_id' => auth('customer')->id()]);
            $items = CartItem::where('cart_id', $cart->id)->with('product')->get();

            foreach ($items as $item) {
                $subtotal = $item->quantity * $item->product->sale_price;
                $totalPrice += $subtotal;
                $totalQty += $item->quantity;

                $cartItems[] = [
                    'id' => $item->product->id,
                    'name' => $item->product->name,
                    'image' => asset('public/'.$item->product->first_image_url),
                    'price' => $item->product->sale_price,
                    'qty' => $item->quantity,
                    'subtotal' => $subtotal,
                    'url' => url('/product/'.$item->product->id),
                ];
            }
        } else {
            $sessionCart = session()->get('cart', new SessionCart());
            $items = $sessionCart->getItems();
            foreach ($items as $item) {
                $subtotal = $item['qty'] * $item['price'];
                $totalPrice += $subtotal;
                $totalQty += $item['qty'];

                $cartItems[] = [
                    'id' => $item['id'],
                    'name' => $item['name'],
                    'image' => $item['image'],
                    'price' => $item['price'],
                    'qty' => $item['qty'],
                    'subtotal' => $subtotal,
                    'url' => url('/product/'.$item['slug']),
                ];
            }
        }

        return response()->json([
            'items' => $cartItems,
            'totalPrice' => $totalPrice,
            'totalQty' => $totalQty,
        ]);
    }

    public function removeFromCart(Request $request)
    {
        try {
            $productId = $request->product_id;

            if (Auth::guard('customer')->check()) {
                $cart = Cart::firstOrCreate(['customer_id' => auth('customer')->id()]);
                CartItem::where('cart_id', $cart->id)
                    ->where('product_id', $productId)
                    ->delete();
            } else {
                $sessionCart = session()->get('cart', new SessionCart());
                $sessionCart->remove($productId);
                session()->put('cart', $sessionCart);
            }

            return response()->json([
                'status' => 'success',
                'message' => 'Product removed from cart'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function viewCart(){
        $breadcrumbs = [
            ['title' => 'Home', 'url' => '#'],
            ['title' => 'Shopping Cart', 'url' => "#"]
        ];

        if(Auth::guard('customer')->check()){
            $cart = Cart::firstOrCreate(['customer_id'=>auth('customer')->id()]);
            $items = CartItem::where('cart_id',$cart->id)->with('product')->get();
        } else {
            $sessionCart = session()->get('cart', new SessionCart());
            $items = collect($sessionCart->getItems()); 
        }

        $totalPrice = 0;
        $totalQty = 0;
        $cartItems = [];

        foreach($items as $item){
            if(Auth::guard('customer')->check()){
                $product = $item->product;
                $qty = $item->quantity;

                $discountPercent = $product->discount_percent ?? 0;
                $discountedPrice = $product->sale_price;
                if ($discountPercent > 0) {
                    $discountedPrice = $product->sale_price - ($product->sale_price * $discountPercent / 100);
                }

                $subtotal = $qty * $discountedPrice;

                $cartItems[] = [
                    'id'=>$product->id,
                    'name'=>$product->name,
                    'image'=> asset('public/'.$product->first_image_url),
                    'price' => $product->sale_price,
                    'discount_price' => $discountedPrice,
                    'discount_percent' => intval($discountPercent),
                    'model' => $product->model,
                    'qty'=>$qty,
                    'subtotal'=>$subtotal,
                    'url'=>url('/product/'.$product->slug)
                ];
            } else {
                $qty = $item['qty'];
                
                $discountPercent = $item['discount_percent'] ?? 0;
                $discountedPrice = $item['price'];
                if ($discountPercent > 0) {
                    $discountedPrice = $item['price'] - ($item['price'] * $discountPercent / 100);
                }

                $subtotal = $qty * $discountedPrice;

                $cartItems[] = [
                    'id'=>$item['id'],
                    'name'=>$item['name'],
                    'image'=>$item['image'],
                    'price'=>$item['price'],
                    'discount_price' => $discountedPrice,
                    'discount_percent' => intval($discountPercent),
                    'model' =>$item['model'],
                    'qty'=>$qty,
                    'subtotal'=>$subtotal,
                    'url'=>url('/product/'.$item['slug'])
                ];
            }
            $totalPrice += $subtotal;
            $totalQty += $qty;
        }

        $relatedProducts = Product::inRandomOrder()->take(12)->get();

        return view('frontend.cart', compact('breadcrumbs','cartItems','totalPrice','totalQty', 'relatedProducts'));
    }

    public function removeFromCartPage($productId)
    {
        if(Auth::guard('customer')->check()) {
            $cart = Cart::firstOrCreate(['customer_id' => auth('customer')->id()]);
            CartItem::where('cart_id', $cart->id)
                ->where('product_id', $productId)
                ->delete();
        } else {
            $sessionCart = session()->get('cart', new SessionCart());
            $sessionCart->remove($productId);
            session()->put('cart', $sessionCart);
        }

        return redirect()->route('cart.view-cart')->with('success', 'Product removed from cart');
    }

    public function cartEdit(Request $request)
    {
        $quantities = $request->input('quantity', []);

        foreach ($quantities as $productId => $qty) {
            if (Auth::guard('customer')->check()) {
                $cart = Cart::firstOrCreate(['customer_id' => auth('customer')->id()]);
                $cartItem = CartItem::where('cart_id', $cart->id)
                                    ->where('product_id', $productId)
                                    ->first();
                if ($cartItem) {
                    $cartItem->quantity = max(1, (int) $qty);
                    $cartItem->save();
                }
            } else {
                $sessionCart = session()->get('cart', new SessionCart());
                $sessionCart->update($productId, $qty);
                session()->put('cart', $sessionCart);
            }
        }

        return redirect()->route('cart.view-cart')->with('success', 'Cart updated successfully.');
    }

    public function cartCheckout(){
        $breadcrumbs = [
            ['title' => 'Shopping Cart', 'url' => "#"],
            ['title' => 'Checkout', 'url' => "#"]
        ];

        if(Auth::guard('customer')->check()){
            $cart = Cart::firstOrCreate(['customer_id'=>auth('customer')->id()]);
            $items = CartItem::where('cart_id',$cart->id)->with('product')->get();
        } else {
            $sessionCart = session()->get('cart', new SessionCart());
            $items = collect($sessionCart->getItems()); 
        }

        $totalPrice = 0;
        $totalQty = 0;
        $cartItems = [];

        foreach($items as $item){
            if(Auth::guard('customer')->check()){
                $product = $item->product;
                $qty = $item->quantity;

                $discountPercent = $product->discount_percent ?? 0;
                $discountedPrice = $product->sale_price;
                if ($discountPercent > 0) {
                    $discountedPrice = $product->sale_price - ($product->sale_price * $discountPercent / 100);
                }

                $subtotal = $qty * $discountedPrice;

                $cartItems[] = [
                    'id'=>$product->id,
                    'name'=>$product->name,
                    'image'=> asset('public/'. $product->first_image_url),
                    'price' => $product->sale_price,
                    'discount_price' => $discountedPrice,
                    'discount_percent' => intval($discountPercent),
                    'model' => $product->model,
                    'qty'=>$qty,
                    'subtotal'=>$subtotal,
                    'url'=>url('/product/'.$product->slug)
                ];
            } else {
                $qty = $item['qty'];

                $discountPercent = $item['discount_percent'] ?? 0;
                $discountedPrice = $item['price'];
                if ($discountPercent > 0) {
                    $discountedPrice = $item['price'] - ($item['price'] * $discountPercent / 100);
                }

                $subtotal = $qty * $discountedPrice;
                
                $cartItems[] = [
                    'id'=>$item['id'],
                    'name'=>$item['name'],
                    'image'=>$item['image'],
                    'price'=>$item['price'],
                    'discount_price' => $discountedPrice,
                    'discount_percent' => intval($discountPercent),
                    'model' =>$item['model'],
                    'qty'=>$qty,
                    'subtotal'=>$subtotal,
                    'url'=>url('/product/'.$item['slug'])
                ];
            }
            $totalPrice += $subtotal;
            $totalQty += $qty;
        }

        $customerAddresses = [];
        if (Auth::guard('customer')->check()) {
            $customerId = auth('customer')->id();
            $customerAddresses = Address::with('region')->where('customer_id', $customerId)->get();
        }

        $regions = Region::get(['name', 'id']);

        return view('frontend.checkout', compact('breadcrumbs', 'cartItems','totalPrice','totalQty', 'customerAddresses', 'regions'));
    }

    public function getCompare()
    {
        $breadcrumbs = [
            ['title' => 'Home', 'url' => url('/')],
            ['title' => 'Compare', 'url' => "#"]
        ];

        if (Auth::guard('customer')->check()) {
            $compareIds = Compare::where('customer_id', auth('customer')->id())
                ->pluck('product_id')
                ->toArray();
        } else {
            $compareIds = session()->get('compare', []);
        }
        $compareIds = array_unique($compareIds);

        $compares = Product::whereIn('id', $compareIds)->get();

        return view('frontend.compare', compact('breadcrumbs', 'compares'));
    }

    public function removeCompare($id) {
        if (Auth::guard('customer')->check()) {
            Compare::where('customer_id', auth('customer')->id())
                ->where('product_id', $id)
                ->delete();
            $compareIds = Compare::where('customer_id', auth('customer')->id())
                                ->pluck('product_id')
                                ->toArray();
        } else {
            $compare = session()->get('compare', []);
            if(($key = array_search($id, $compare)) !== false) {
                unset($compare[$key]);
                session()->put('compare', array_values($compare));
            }
            $compareIds = session()->get('compare', []);
        }
        $compareIds = array_unique($compareIds);
        $compares = Product::whereIn('id', $compareIds)->get();
        $breadcrumbs = [
            ['title' => 'Home', 'url' => url('/')],
            ['title' => 'Compare', 'url' => '#']
        ];

        return redirect()->back()->with('success', 'Product removed from compare!');
    }

    public function getWishlist()
    {
        $breadcrumbs = [
            ['title' => 'Home', 'url' => url('/')],
            ['title' => 'Wishlist', 'url' => "#"]
        ];

        if (Auth::guard('customer')->check()) {
            $wishlistIds = Wishlist::where('customer_id', auth('customer')->id())
                ->pluck('product_id')
                ->toArray();
        } else {
            $wishlistIds = session()->get('wishlist', []);
        }
        $wishlistIds = array_unique($wishlistIds);

        $wishlists = Product::whereIn('id', $wishlistIds)->get();

        return view('frontend.wishlist', compact('breadcrumbs', 'wishlists'));
    }

    public function removeWishlist($id) {
        if (Auth::guard('customer')->check()) {
            Wishlist::where('customer_id', auth('customer')->id())
                ->where('product_id', $id)
                ->delete();
            $wishlistIds = Wishlist::where('customer_id', auth('customer')->id())
                                ->pluck('product_id')
                                ->toArray();
        } else {
            $compare = session()->get('wishlist', []);
            if(($key = array_search($id, $compare)) !== false) {
                unset($compare[$key]);
                session()->put('wishlist', array_values($compare));
            }
            $wishlistIds = session()->get('wishlist', []);
        }
        $wishlistIds = array_unique($wishlistIds);
        $wishlists = Product::whereIn('id', $wishlistIds)->get();
        $breadcrumbs = [
            ['title' => 'Home', 'url' => url('/')],
            ['title' => 'Wishlist', 'url' => '#']
        ];

        return redirect()->back()->with('success', 'Product removed from wishlist!');
    }

    public function getCities($region_id)
    {
        $cities = City::where('region_id', $region_id)->get();
        return response()->json($cities);
    }

}
