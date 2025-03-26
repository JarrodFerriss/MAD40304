<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Article;

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
        Paginator::useBootstrapFive();

         // Use a View Composer to pass the last posted article title to the master layout
        View::composer('master', function ($view) {
            $lastArticle = Article::latest()->first(); // Get the most recent article
            return $view->with('lastPostedArticle', $lastArticle->name);
        });
    }
}
