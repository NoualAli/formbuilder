<?php

namespace NLDev\FormBuilder;

use Illuminate\Support\ServiceProvider;

class FormBuilderServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->loadViewsFrom(__DIR__.'/../views', 'FormBuilder');
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
            __DIR__.'/../assets/js' => resource_path('js'),
            __DIR__.'/../assets/css' => resource_path('css'),
        ], 'nldev/FormBuilder');
    }
}
