<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\GeneralSetting;
use App\Models\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;
use App\Models\Wishlist;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            $settings = cache()->remember('general_settings', 3600, function () {
                return GeneralSetting::first();
            });
            $view->with('generalSettings', $settings);
        });

        View::composer('*', function ($view) {
            try {
                $categories = Cache::rememberForever('menu_categories', function () {
                    return Category::with(['children' => function ($q) {
                        $q->where('status', true);
                    }])
                    ->whereNull('parent_id')
                    ->where('status', true)
                    ->get();
                });
            } catch (\Exception $e) {
                $categories = collect();
            }

            $view->with('menuCategories', $categories);

            $wishlistCount = 0;
            if (auth()->guard('customer')->check()) {
                $wishlistCount = Wishlist::where('customer_id', auth()->id())->count();
            } else {
                $wishlist = session()->get('wishlist', []);
                $wishlistCount = count($wishlist);
            }
            $view->with('wishlistCount', $wishlistCount);
        });
    }
}
