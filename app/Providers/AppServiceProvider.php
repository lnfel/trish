<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
        // https://qiita.com/akkie/items/b0fb3ba5cd4d8db70788
        // force https production in heroku
        if(\App::environment('production')) {
            \URL::forceScheme( 'https' );
        }
    }
}
