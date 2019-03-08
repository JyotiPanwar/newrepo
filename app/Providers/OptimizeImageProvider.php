<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\OptimizeImage;


class OptimizeImageProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('optimize_image',function(){
            return new OptimizeImage();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
