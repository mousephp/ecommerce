<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Schema\Builder;

use App\Models\Category;
use App\Models\Slide;

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
        $data['slide']      = Slide::all()->random(1);
        $data['categories'] = Category::where('cate_status',1)->get();
        view()->share($data);
        Builder::defaultStringLength(191);
    }
}
