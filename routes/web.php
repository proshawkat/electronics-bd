<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\GeneralSettingController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\Customer\Auth\LoginController;
use App\Http\Controllers\Frontend\Customer\Auth\RegisterController;
use App\Http\Controllers\Frontend\Customer\CustomerController;

Route::get('/', [WelcomeController::class, 'index'])->name('home');
Route::get('/single-product/{id}', [WelcomeController::class, 'singleProduct'])->name('single-product');
Route::get('/product/{slug}', [WelcomeController::class, 'slugWiseroduct'])->name('slug-product');

Route::prefix('category')->name('category.')->group(function () {
    Route::get('/{slug}', [HomeController::class, 'categoryWiseProduct'])->name('show');
    Route::get('/{slug}/{sub_slug}', [HomeController::class, 'subCategoryWiseProduct'])->name('sub.show');
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


    Route::resource('categories', CategoryController::class);
    Route::resource('brands', BrandController::class);
    Route::resource('products', ProductController::class);
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
