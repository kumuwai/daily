<?php namespace Kumuwai\Playground\Modules\Base\Providers;

use App;
use Config;
use Lang;
use View;
use Illuminate\Support\ServiceProvider;

use Kumuwai\Playground\Modules\Base\Domain\Projects;
use Kumuwai\Playground\Modules\Base\Domain\Tools;


class BaseServiceProvider extends ServiceProvider
{
    /**
     * Register the Base module service provider.
     *
     * @return void
     */
    public function register()
    {
        // This service provider is a convenient place to register your modules
        // services in the IoC container. If you wish, you may make additional
        // methods or service providers to keep the code more focused and granular.
        App::register('Kumuwai\Playground\Modules\Base\Providers\RouteServiceProvider');
        App::register('Kumuwai\Playground\Modules\Base\Providers\AssetsServiceProvider');

        $this->app->bind('projects.base', function($app){
            return new Projects($app['modules'], new Tools);
        });

        $this->registerNamespaces();
    }

    /**
     * Register the Base module resource namespaces.
     *
     * @return void
     */
    protected function registerNamespaces()
    {
        Lang::addNamespace('base', realpath(__DIR__.'/../Resources/Lang'));

        View::addNamespace('base', realpath(__DIR__.'/../Resources/Views'));
    }
}
