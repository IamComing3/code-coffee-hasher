<?php

namespace CodeCoffee\Hasher;

use Illuminate\Support\ServiceProvider;

class Md5HasherServiceProdiver extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('md5hasher', function () {
            return new Md5Hasher();
        });
    }
}
