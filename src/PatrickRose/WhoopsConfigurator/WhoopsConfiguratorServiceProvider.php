<?php namespace PatrickRose\WhoopsConfigurator;

use Config;
use Illuminate\Support\ServiceProvider;
use Whoops\Handler\PrettyPageHandler;

class WhoopsConfiguratorServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->package("patrickrose", "whoops-configurator");
        Config::package('patrickrose/whoops-configurator', __DIR__.'/../../config');

        DeferredWhoopsHandler::updateWhoops();

   }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }

}
