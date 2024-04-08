<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Request;

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
        //
        Schema::defaultStringLength(191);
        //cau hinh css phan trang
        Paginator::useBootstrap();
        View::composer('*', function ($view) {
            $segments = Request::segments();
            $breadcrumbs = [];
            $url = '';

            foreach ($segments as $segment) {
                $url .= '/' . $segment;
                $breadcrumbs[] = [
                    'name' => ucfirst($segment),
                    'url' => $url,
                ];
            }

            $view->with('breadcrumbs', $breadcrumbs);
        });
    }
}
