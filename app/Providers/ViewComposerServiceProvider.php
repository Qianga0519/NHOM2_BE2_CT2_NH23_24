<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Category;
use App\Models\Manufacture;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $category_cps = config('category_cps');
        View::composer($category_cps, function ($view) {
            $categories = Category::all();
            $view->with('categories', $categories);
        });
        $manufacture_cps = config('manufacture_cps');
        View::composer($manufacture_cps, function ($view) {
            $manufacture = Manufacture::all();
            $view->with('manufacture', $manufacture);
        });
    }
}
