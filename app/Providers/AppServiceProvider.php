<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

use App\{Category,Cart,CartItem};

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $cart = Cart::with('totalPrice')->first();
        View::share('cart', $cart);

        // $cart_item = CartItem::where('cart_id', 1)->get();
        // View::share('cart_item', $cart_item);

        $cart_item = CartItem::where('cart_id', 1)->sum('amount');
        View::share('cart_item', $cart_item);

        $categories = Category::where('category_id', NULL)->get();
        View::share('categories', $categories);

    }
}
