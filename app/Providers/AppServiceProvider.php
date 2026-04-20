<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\SiteInfo;
use App\Models\SiteComentario;
use App\Models\Category;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        View::composer('public.layout.main-navbar', function ($view) {
            $categories = Category::all();
            $view->with('categories', $categories);
        });

        View::composer('public.layout.main-footer', function ($view) {
            $comments = SiteComentario::latest()->take(3)->get();
            $info = SiteInfo::first();
            $view->with(['info' => $info, 'comments' => $comments]);
        });
    }
}
