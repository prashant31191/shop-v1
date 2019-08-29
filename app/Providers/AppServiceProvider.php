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
        // $cart = Cart::with('totalPrice')->first();
        // View::share('cart', $cart);

        $cart_items = CartItem::where('cart_id', 1)->get();
        View::share('cart_items', $cart_items);

        $total_cart_value = 0;
        foreach ($cart_items as $item) {
            $total_cart_value += $item->itemPrice->value*$item->amount;
        }
        View::share('total_cart_value', $total_cart_value);


        $cart_items_amount = $cart_items->sum('amount');
        View::share('cart_items_amount', $cart_items_amount);


        // $total_cart_items_value = CartItem::with('itemPrice')->sum('itemPrice.value');

        $total_cart_items_value = $cart_items->sum('amount');
        View::share('total_cart_items_value', $total_cart_items_value);   

        $categories = Category::where('category_id', NULL)->get();
        View::share('categories', $categories);

    }
}
