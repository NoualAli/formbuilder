<?php

namespace NLDev\FormBuilder;

use Illuminate\Support\ServiceProvider;

class FormBuilderProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // $this->app->make('NLDev\FormBuilder\FormBuilderController');
        $this->loadViewsFrom(__DIR__.'/views', 'FormBuilder');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        include __DIR__.'/routes.php';

        $this->publishes([
            __DIR__.'/assets/js' => public_path('vendor/nldev/js'),
            __DIR__.'/assets/css' => public_path('vendor/nldev/css'),
        ], 'nldev');
    }
}
