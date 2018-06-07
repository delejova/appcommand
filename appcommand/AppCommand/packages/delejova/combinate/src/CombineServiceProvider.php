<?php

namespace Delejova\Combinate;

use Illuminate\Support\ServiceProvider;

class CombineServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
        $this->commands([
            // add command class
            Console\Commands\Combination::class,
        ]);
    }

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
