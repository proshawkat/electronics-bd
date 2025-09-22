<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\GeneralSettingController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\OrderController;
use App\Http\Controllers\Frontend\Customer\Auth\LoginController;
use App\Http\Controllers\Frontend\Customer\Auth\RegisterController;
use App\Http\Controllers\Frontend\Customer\Auth\ForgotPasswordController;
use App\Http\Controllers\Frontend\Customer\CustomerController;
use App\Http\Controllers\Frontend\Customer\CustomerProfileController;
use App\Http\Controllers\Frontend\Customer\CustomerOrderController;
use App\Http\Controllers\Frontend\Customer\ReturnController;
use Illuminate\Support\Facades\Mail;

Route::get('/', [WelcomeController::class, 'index'])->name('home');
Route::get('/single-product/{id}', [WelcomeController::class, 'singleProduct'])->name('single-product');
Route::get('/product/{slug}', [WelcomeController::class, 'slugWiseroduct'])->name('slug-product');
Route::post('/action', [CartController::class, 'action'])->name('action');
Route::get('/compare', [CartController::class, 'getCompare'])->name('compare');
Route::get('/remove-compare/{id}', [CartController::class, 'removeCompare'])->name('remove-compare');
Route::get('/wishlist', [CartController::class, 'getWishlist'])->name('wishlist');
Route::post('/placeorder', [OrderController::class, 'placeOrder'])->name('placeorder');
Route::get('/order/success', [OrderController::class, 'orderSuccess'])->name('order.success');
Route::get('/cities/{region_id}', [CartController::class, 'getCities']);

Route::get('customer/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('customer.password.request');
Route::post('customer/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('customer.password.email');
Route::get('customer/reset-password/{token}', [ForgotPasswordController::class, 'showResetForm'])->name('customer.password.reset');
Route::post('customer/reset-password', [ForgotPasswordController::class, 'resetPass'])->name('customer.password.resetupdate');


Route::prefix('cart')->name('cart.')->group(function () {
    Route::get('/items', [CartController::class, 'getCart']);
    Route::post('/remove', [CartController::class, 'removeFromCart']);
    Route::get('/view', [CartController::class, 'viewCart'])->name('view-cart');
    Route::get('/checkout', [CartController::class, 'cartCheckout'])->name('cart-checkout');
    Route::post('/edit', [CartController::class, 'cartEdit'])->name('edit');
    Route::get('/remove/{id}', [CartController::class, 'removeFromCartPage'])->name('remove');
});    

Route::prefix('category')->name('category.')->group(function () {
    Route::get('/{slug}', [HomeController::class, 'categoryWiseProduct'])->name('show');
    Route::get('/{slug}/{sub_slug}', [HomeController::class, 'subCategoryWiseProduct'])->name('sub.show');
});

Route::prefix('contact')->name('contact.')->group(function () {
    Route::get('/', [ContactController::class, 'index'])->name('index');
    Route::post('/store', [ContactController::class, 'store'])->name('store');
});

Route::prefix('customer')->name('customer.')->group(function () {
    Route::middleware('guest:customer')->group(function () {
        Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
        Route::post('login', [LoginController::class, 'login'])->name('login.submit');

        Route::get('register', [RegisterController::class, 'showRegisterForm'])->name('register');
        Route::post('register', [RegisterController::class, 'register'])->name('register.submit');
    });

    Route::middleware('auth.customer')->group(function () {
        Route::get('dashboard', [CustomerController::class, 'dashboard'])->name('dashboard');
        Route::post('logout', [LoginController::class, 'logout'])->name('logout');
        
        Route::get('address', [CustomerController::class, 'getAddress'])->name('address');    
        Route::get('new-address', [CustomerController::class, 'newAddress'])->name('new_address');    
        Route::post('add-address', [CustomerController::class, 'storeAddress'])->name('add_address');  
        Route::put('update-address/{address_id}', [CustomerController::class, 'updateAddress'])->name('update_address'); 
        Route::get('edit-address/{address_id}', [CustomerController::class, 'editAddress'])->name('edit_address');     
        Route::get('delete-address/{address_id}', [CustomerController::class, 'deleteAddress'])->name('delete_address');  
        Route::get('order', [CustomerOrderController::class, 'orderHistory'])->name('order'); 
        Route::get('order-details/{order_id}', [CustomerOrderController::class, 'orderDetails'])->name('order_details');
        Route::get('return', [ReturnController::class, 'return'])->name('return'); 
        Route::get('order-return/{order_id}', [ReturnController::class, 'create'])->name('order_return'); 
        Route::post('/order/{order}/return', [ReturnController::class, 'store'])->name('return.store');

        
        Route::get('edit-info', [CustomerController::class, 'editInfo'])->name('edit_info'); 
        Route::put('/store-edit-info', [CustomerController::class, 'updateInfo'])->name('store_edit_info');

        Route::get('customer/change-password', [CustomerProfileController::class, 'showChangePasswordForm'])->name('password.change');
        Route::post('customer/change-password', [CustomerProfileController::class, 'updatePassword'])->name('password.update');

    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


/**
 * Admin only routes
 */
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('general-settings', [GeneralSettingController::class, 'edit'])->name('general-settings.edit');
    Route::post('general-settings', [GeneralSettingController::class, 'update'])->name('general-settings.update');


    // web.php
    Route::get('/get-subcategories/{category_id}', [CategoryController::class, 'getSubcategories']);
    Route::get('/newsletter', [DashboardController::class, 'getNewsletter'])->name('newsletter');
    Route::get('/customer', [DashboardController::class, 'getCustomer'])->name('customer');
    Route::get('/contact-us', [DashboardController::class, 'getContactUs'])->name('contact-us');


    Route::resource('categories', CategoryController::class);
    Route::resource('brands', BrandController::class);
    Route::resource('products', ProductController::class);
    Route::resource('sliders', SliderController::class);
});

/**
 * Manager only routes
 */
Route::middleware(['auth', 'role:manager'])->group(function () {
    Route::get('/manager/dashboard', function () {
        return "Welcome Manager!";
    });
});

/**
 * Salesman only routes
 */
Route::middleware(['auth', 'role:salesman'])->group(function () {
    Route::get('/salesman/dashboard', function () {
        return "Welcome Salesman!";
    });
});

require __DIR__.'/auth.php';
