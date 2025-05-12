<?php

namespace App\Providers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

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
		Route::bind('article',function ($article){
			return Article::query()->where('slug',$article)->firstOrFail();
		});
		Route::bind('category', function ($category) {
			return Category::query()->where('id', $category)->firstOrFail();
		});
	}
}
