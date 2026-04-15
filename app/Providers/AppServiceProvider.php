<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\SiteInfo;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::share('categories', Category::all());
        View::share('siteInfo', SiteInfo::first());
    }
}
