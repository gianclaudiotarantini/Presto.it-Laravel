<?php

namespace App\Providers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

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
        if(Schema::hasTable('articles')){
            view()->share('articles', Article::all());
        }

        if(Schema::hasTable('categories')){
            view()->share('categories', Category::all());
        }

        Paginator::useBootstrap();
    }
}
