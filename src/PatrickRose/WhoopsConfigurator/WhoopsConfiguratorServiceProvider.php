<?php namespace PatrickRose\WhoopsConfigurator;

use Illuminate\Exception\ExceptionServiceProvider;

class WhoopsConfiguratorServiceProvider extends ExceptionServiceProvider
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
        $this->package("patrickrose\whoops-configurator");

        parent::register();
   }

    protected function registerPrettyWhoopsHandler()
    {

        $me = $this;

        $this->app['whoops.handler'] = $this->app->share(function() use ($me)
        {
            with($handler = DeferredWhoopsHandlerCreator::makeWhoops())->setEditor('sublime');

            // If the resource path exists, we will register the resource path with Whoops
            // so our custom Laravel branded exception pages will be used when they are
            // displayed back to the developer. Otherwise, the default pages are run.
            if ( ! is_null($path = $me->resourcePath()))
            {
                $handler->setResourcesPath($path);
            }

            return $handler;
        });
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
