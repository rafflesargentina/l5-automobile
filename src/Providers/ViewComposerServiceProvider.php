<?php

namespace RafflesArgentina\Automobile\Providers;

use Illuminate\Support\ServiceProvider;

use Javascript;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $prefix = config('automobile.prefix');
        if ($prefix) {
            $prefix .= '.';
        }

        $module = config('automobile.module') ?: 'automobile';
        if ($module) {
            $module .= '::';
        }

        $resourceName = config('automobile.resource_name') ?: 'automobiles';

        view()->composer($module.'partials.header', 'RafflesArgentina\Automobile\Http\ViewComposers\LayoutPartialsComposer@composeHeader');
        view()->composer('vendor.automobile.partials.header', 'RafflesArgentina\Automobile\Http\ViewComposers\LayoutPartialsComposer@composeHeader');

        view()->composer($module.$resourceName.'.index', 'RafflesArgentina\Automobile\Http\ViewComposers\AutomobilesComposer@composeIndex');
        view()->composer('vendor.automobile.index', 'RafflesArgentina\Automobile\Http\ViewComposers\AutomobilesComposer@composeIndex');

        view()->composer($module.$resourceName.'.partials.pluma-create-form', 'RafflesArgentina\Automobile\Http\ViewComposers\AutomobilesComposer@composeCreate');
        view()->composer('vendor.automobile.automobiles.partials.pluma-create-form', 'RafflesArgentina\Automobile\Http\ViewComposers\AutomobilesComposer@composeCreate');

        view()->composer($module.$resourceName.'.partials.pluma-edit-form', 'RafflesArgentina\Automobile\Http\ViewComposers\AutomobilesComposer@composeEdit');
        view()->composer('vendor.automobile.automobiles.partials.pluma-edite-form', 'RafflesArgentina\Automobile\Http\ViewComposers\AutomobilesComposer@composeEdit');

        Javascript::put([
            'prefix' => str_replace('.', '/', $prefix),
            'resourceName' => $resourceName,
        ]);
    }
}
