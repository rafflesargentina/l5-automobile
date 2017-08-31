<?php

namespace RafflesArgentina\Automobile\Providers;

use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $module = config('automobile.module') ?: 'automobile';
        view()->composer($module.'::partials.header', 'RafflesArgentina\Automobile\Http\ViewComposers\LayoutPartialsComposer@composeHeader');
        view()->composer('vendor.automobile.partials.header', 'RafflesArgentina\Automobile\Http\ViewComposers\LayoutPartialsComposer@composeHeader');

        view()->composer($module.'::automobiles.index', 'RafflesArgentina\Automobile\Http\ViewComposers\AutomobilesComposer@composeIndex');
        view()->composer('vendor.automobile.index', 'RafflesArgentina\Automobile\Http\ViewComposers\AutomobilesComposer@composeIndex');

        view()->composer($module.'::automobiles.partials.pluma-create-form', 'RafflesArgentina\Automobile\Http\ViewComposers\AutomobilesComposer@composeCreate');
        view()->composer('vendor.automobile.automobiles.partials.pluma-create-form', 'RafflesArgentina\Automobile\Http\ViewComposers\AutomobilesComposer@composeCreate');

        view()->composer($module.'::automobiles.partials.pluma-edit-form', 'RafflesArgentina\Automobile\Http\ViewComposers\AutomobilesComposer@composeEdit');
        view()->composer('vendor.automobile.automobiles.partials.pluma-edite-form', 'RafflesArgentina\Automobile\Http\ViewComposers\AutomobilesComposer@composeEdit');
    }
}
