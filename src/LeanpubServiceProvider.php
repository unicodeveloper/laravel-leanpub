<?php

namespace Unicodeveloper\Leanpub;

use Illuminate\Support\ServiceProvider;

class LeanpubServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the application services
     * @return void
     */
    public function register()
    {
        $this->app->bind('laravel-leanpub', function(){

            return new LeanpubManager;

        });
    }

    /**
     * Get the services provided by the provider
     * @return array
     */
    public function provides()
    {
        return ['laravel-leanpub'];
    }
}