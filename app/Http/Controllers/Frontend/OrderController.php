<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Customer;
use App\Models\Address;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use App\Services\SessionCart;
use App\Mail\OrderPlacedMail;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function placeOrder(Request $request)
    {
        try {
            if ($request->action === 'update') {
                foreach ($request->quantity as $itemId => $qty) {
                    if (Auth::guard('customer')->check()) {
                        CartItem::where('product_id', $itemId)->update(['quantity' => $qty]);
                    }else{
                        $sessionCart = session()->get('cart', new SessionCart());
                        $sessionCart->update($itemId, $qty);
                        session()->put('cart', $sessionCart);
                    }    
                }
                return redirect()->back()->with('success', 'Cart updated successfully.');
            }
            
            $accountType = $request->account;
            
            if ($accountType === 'register') {
                $validate = $request->validate([
                    'firstname' => 'required|string|max:50',
                    'lastname'  => 'required|string|max:50',
                    'email'     => 'required|email',
                    'password'  => 'required|min:6|confirmed',
                    'telephone' => 'required|string|max:20',
                ]);

                if (Customer::where('email', $request->email)->exists()) {
                    return redirect()->back()->with('error', 'This email address is already registered. Please login instead.');
                }

                $user = Customer::create([
                    'first_name' => $request->firstname,
                    'last_name'  => $request->lastname,
                    'email'      => $request->email,
                    'password'   => bcrypt($request->password),
                    'telephone'  => $request->telephone,
                ]);
                auth('customer')->login($user);
                $customerId = $user->id;

                if ($guestCart = session()->get('cart')) {
                    $cart = Cart::firstOrCreate(['customer_id' => $customerId]);
                    foreach ($guestCart->getItems() as $item) {
                        $cartItem = CartItem::firstOrNew([
                            'cart_id'    => $cart->id,
                            'product_id' => $item['id'],
                        ]);
                        $cartItem->quantity = ($cartItem->exists ? $cartItem->quantity : 0) + $item['qty'];
                        $cartItem->save();
                    }
                }

                if ($guestWishlist = session()->get('wishlist')) {
                    foreach ($guestWishlist as $productId) {
                        Wishlist::firstOrCreate([
                            'customer_id' => $customerId,
                            'product_id' => $productId
                        ]);
                    }
                }
            } elseif ($accountType === 'login') {
                $request->validate([
                    'login_email'    => 'required|email',
                    'login_password' => 'required|string',
                ]);

                $credentials = [
                    'email'    => $request->login_email,
                    'password' => $request->login_password,
                ];

                if (Auth::guard('customer')->attempt($credentials)) {

                    if ($guestCart = session()->get('cart')) {
                        $cart = Cart::firstOrCreate(['customer_id' => auth('customer')->id()]);
                        foreach ($guestCart->getItems() as $item) {
                            $cartItem = CartItem::firstOrNew([
                                'cart_id'    => $cart->id,
                                'product_id' => $item['id'],
                            ]);
                            $cartItem->quantity = ($cartItem->exists ? $cartItem->quantity : 0) + $item['qty'];
                            $cartItem->save();
                        }
                        // session()->forget('cart');
                    }

                    if ($guestWishlist = session()->get('wishlist')) {
                        foreach ($guestWishlist as $productId) {
                            Wishlist::firstOrCreate([
                                'customer_id' => auth('customer')->id(),
                                'product_id' => $productId
                            ]);
                        }
                        // session()->forget('wishlist'); 
                    }

                    return redirect()->route('cart.cart-checkout')
                                    ->with('success', 'You are now logged in. Please confirm your order.');
                } else {
                    return back()->withErrors(['email' => 'Invalid login credentials']);
                }

            } elseif (Auth::guard('customer')->check()) {
                $customerId = Auth::guard('customer')->id();
            } else {
                $customerId = null;
            }
            $request->validate([
                'newsletter'        => 'nullable|boolean',
                'privacy_policy'    => 'accepted',
                'terms_conditions'  => 'accepted',
            ], [
                'privacy_policy.accepted'   => 'You must agree to the Privacy Policy.',
                'terms_conditions.accepted' => 'You must agree to the Terms & Conditions.',
            ]);

            $cartItems = $this->getCartItems($customerId);

            $address = null;
            
            if ($customerId && $request->address_option == 'existing') {
                $address = Address::where('id', $request->billing_address_id)->first();
                if (!$address) {
                    return redirect()->back()->with('error', 'Please add your billing address before placing an order.');
                }
            }else if($customerId && $request->address_option == 'new'){
                $request->validate([
                    'firstname' => 'required|string|max:50',
                    'email'     => 'required|email',
                    'telephone' => 'required|string|max:20',
                    'address_1' => 'required|string|max:255',
                    'city'      => 'required|string|max:100',
                    'zone_id'   => 'required|exists:regions,id',
                ]);
                $address = Address::create([
                    'customer_id' => $customerId,
                    'first_name'  => $request->firstname,
                    'last_name'   => $request->lastname,
                    'email'       => $request->email,
                    'telephone'   => $request->telephone,
                    'address_1'   => $request->address_1,
                    'address_2'   => $request->address_2,
                    'city'        => $request->city,
                    'zone_id'     => $request->zone_id,
                ]);
            } else {
                $request->validate([
                    'firstname' => 'required|string|max:50',
                    'email'     => 'required|email',
                    'telephone' => 'required|string|max:20',
                    'address_1' => 'required|string|max:255',
                    'city'      => 'required|string|max:100',
                    'zone_id'   => 'required|exists:regions,id',
                ]);
                $address = Address::create([
                    'customer_id' => $customerId,
                    'first_name'  => $request->firstname,
                    'last_name'   => $request->lastname,
                    'email'       => $request->email,
                    'telephone'   => $request->telephone,
                    'address_1'   => $request->address_1,
                    'address_2'   => $request->address_2,
                    'city'        => $request->city,
                    'zone_id'     => $request->zone_id,
                ]);
            }    
            $shipping_address = null;
            if(!$request->same_billing_address){
                $request->validate([
                    'shipping_firstname' => 'required|string|max:50',
                    'shipping_address_1' => 'required|string|max:255',
                    'shipping_city'      => 'required|string|max:100',
                    'shipping_zone_id'   => 'required|exists:regions,id',
                ]);
                $shipping_address = Address::create([
                    'customer_id' => $customerId,
                    'first_name'  => $request->shipping_firstname,
                    'address_1'   => $request->shipping_address_1,
                    'city'        => $request->shipping_city,
                    'zone_id'     => $request->shipping_zone_id,
                ]);
            }

            DB::beginTransaction();
            
            // === Create Order ===
            $order = Order::create([
                'customer_id'        => $customerId,
                'billing_address_id' => $address->id,
                'shipping_address_id' => $shipping_address?->id,
                'total'              => $this->calculateCartTotal($customerId),
                'status'             => 'Pending',
                'order_comment'     => $request->order_comment,
                'shipping_method'   => 'Pickup From Store',            
                'payment_method'     => 'Cash on Delivery'

            ]);

            foreach ($cartItems as $item) {
                if ($customerId) {
                    $product = Product::find($item->product_id);
                    $price = $product->discounted_price;
                    OrderItem::create([
                        'order_id'   => $order->id,
                        'product_id' => $item->product_id,
                        'quantity'   => $item->quantity,
                        'price'      => $price,
                        'discount_percent' => $product->discount_percent,
                        'total'      => $price * $item->quantity,
                    ]);
                } else {
                    $price = $item['discount_price'];
                    // Guest cart (array)
                    OrderItem::create([
                        'order_id'   => $order->id,
                        'product_id' => $item['id'],
                        'quantity'   => $item['qty'],
                        'price'      => $price,
                        'discount_percent' => $item['discount_percent'],
                        'total'      => $price * $item['qty'],
                    ]);
                }
            }
            DB::commit();
            // === Clear Cart ===
            if ($customerId) {
                Cart::where('customer_id', $customerId)->delete();
                session()->forget('cart');
            } else {
                session()->forget('cart');
            }

            $email = auth('customer')->check() ? auth('customer')->user()->email : $request->email;
            Mail::to($email)->send(new OrderPlacedMail($order));
            return redirect()->route('order.success');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Order failed. Please try again.');
        }

    }

    /**
     * Get cart items (DB or Session).
     */
    protected function getCartItems($customerId = null)
    {
        if ($customerId) {
            $cart = Cart::with('items.product')->where('customer_id', $customerId)->first();
            return $cart?->items ?? collect([]);
        }
        $sessionCart = session()->get('cart', new SessionCart());
        return collect($sessionCart->getItems());
    }

    /**
     * Calculate total amount of the cart.
     */
    protected function calculateCartTotal($customerId = null): float
    {
        $items = $this->getCartItems($customerId);
        $total = 0;

        foreach ($items as $item) {
            if ($customerId) {
                $qty = $item->quantity ?? 1;
                $product = $item->product;

                if ($product) {
                    $discount = ($product->discount_percent > 0) ? ($product->sale_price * $product->discount_percent) / 100 : 0;
                    $price = $product->sale_price - $discount;
                } else {
                    $price = 0;
                }
            } else {
                $qty = $item['qty'] ?? 1;

                $product = Product::find($item['id']);
                if ($product) {
                    $discount = ($product->discount_percent > 0) ? ($product->sale_price * $product->discount_percent) / 100 : 0;
                    $price = $product->sale_price - $discount;
                } else {
                    $price = 0;
                }
            }

            $total += $price * $qty;
        }

        return round($total, 2);
    }

    public function orderSuccess(){
        $breadcrumbs = [
            ['title' => 'Shopping Cart', 'url' => '#'],
            ['title' => 'Checkout', 'url' => '#'],
            ['title' => 'Success', 'url' => '#']
        ];
        return view('frontend.thankyou', compact('breadcrumbs'));
    }

}
