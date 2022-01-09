<?php

namespace App\Providers;

use App\Models\Company_contact;
use App\Models\Products_category;
use Illuminate\Support\ServiceProvider;

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
        //shared
        $product_categories=Products_category::get();
        $contact = Company_contact::where('id', 1)->first();
        view()->share(['contact'=>$contact,'product_categories'=>$product_categories]);
    }
}
