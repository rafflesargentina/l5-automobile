<?php

namespace RafflesArgentina\Automobile;

use Illuminate\Support\ServiceProvider;

use RafflesArgentina\Automobile\Models\Automobile;
use RafflesArgentina\Automobile\Observers\AutomobileObserver;
use RafflesArgentina\Automobile\Providers\RouteServiceProvider;
use RafflesArgentina\Automobile\Providers\ExceptionServiceProvider;
use RafflesArgentina\Automobile\Providers\ViewComposerServiceProvider;

class AutomobileServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([__DIR__.'/Config/automobile.php' => config_path('automobile.php')], 'automobile');

        $this->publishes([__DIR__.'/Database/Migrations' => database_path('migrations')], 'automobile');

        $this->publishes([__DIR__.'/Resources/Views' => resource_path('views/vendor/automobile')], 'automobile');

        $this->publishes([__DIR__.'/../assets/js/automobile.js' => public_path('js/automobile.js')], 'automobile');

        $this->loadMigrationsFrom(__DIR__.'/Database/Migrations');

        $this->loadViewsFrom(__DIR__.'/Resources/Views', 'automobile');

        Automobile::observe(AutomobileObserver::class);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/Config/automobile.php', 'automobile');

        $this->app->register(RouteServiceProvider::class);
        $this->app->register(ExceptionServiceProvider::class);
        $this->app->register(ViewComposerServiceProvider::class);

        $this->app->singleton('JavaScript', function ($app) {
            $view = config('automobile.bind_js_vars_to_this_view');
            $namespace = config('automobile.js_namespace');

            $binder = new \Laracasts\Utilities\JavaScript\LaravelViewBinder($app['events'], $view);

            return new \Laracasts\Utilities\JavaScript\PHPToJavaScriptTransformer($binder, $namespace);
        });

        $loader = \Illuminate\Foundation\AliasLoader::getInstance();
        $loader->alias('Javascript', \Laracasts\Utilities\JavaScript\JavaScriptFacade::class);
    }
}
