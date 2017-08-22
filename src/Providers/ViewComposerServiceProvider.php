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
        view()->composer('automobile::partials.header', 'RafflesArgentina\Automobile\Http\ViewComposers\LayoutPartialsComposer@composeHeader');
        view()->composer('vendor.automobile.partials.header', 'RafflesArgentina\Automobile\Http\ViewComposers\LayoutPartialsComposer@composeHeader');

        view()->composer('automobile::automobiles.partials.pluma-create-form', 'RafflesArgentina\Automobile\Http\ViewComposers\AutomobilesComposer@composeCreate');
        view()->composer('vendor.automobile.automobiles.partials.pluma-create-form', 'RafflesArgentina\Automobile\Http\ViewComposers\AutomobilesComposer@composeCreate');

        view()->composer('automobile::automobiles.partials.pluma-edit-form', 'RafflesArgentina\Automobile\Http\ViewComposers\AutomobilesComposer@composeEdit');
        view()->composer('vendor.automobile.automobiles.partials.pluma-edite-form', 'RafflesArgentina\Automobile\Http\ViewComposers\AutomobilesComposer@composeEdit');
    }
}
