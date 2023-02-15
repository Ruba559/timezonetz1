<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use App\Models\Brand;

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
        // Using view composer to set following variables globally
        view()->composer('*',function($view) {
            $view->with('fade_arr', ['fade-up','fade-down','fade-right','fade-left','zoom-in','zoom-out']);
        });

        view()->composer('layouts.master', function ($view) {
            $view->with('categories',
                Category::get());
        });

        view()->composer('layouts.master', function ($view) {
            $view->with('brands',
                Brand::get());
        });
    }
}
