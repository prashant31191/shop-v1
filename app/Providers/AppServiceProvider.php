<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

use App\{Category,Cart};

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
        $cart = Cart::with('total_price')->first();
        View::share('cart', $cart);

        $categories = Category::where('category_id', NULL)->get();
        View::share('categories', $categories);

    }
}
