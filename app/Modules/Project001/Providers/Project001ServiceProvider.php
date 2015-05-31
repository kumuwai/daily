<?php
namespace Kumuwai\Playground\Modules\Project001\Providers;

use App;
use Config;
use Lang;
use View;
use Illuminate\Support\ServiceProvider;

class Project001ServiceProvider extends ServiceProvider
{
    /**
     * Register the Project001 module service provider.
     *
     * @return void
     */
    public function register()
    {
        // This service provider is a convenient place to register your modules
        // services in the IoC container. If you wish, you may make additional
        // methods or service providers to keep the code more focused and granular.
        App::register('Kumuwai\Playground\Modules\Project001\Providers\RouteServiceProvider');

        $this->registerNamespaces();
    }

    /**
     * Register the Project001 module resource namespaces.
     *
     * @return void
     */
    protected function registerNamespaces()
    {
        Lang::addNamespace('project001', realpath(__DIR__.'/../Resources/Lang'));

        View::addNamespace('project001', realpath(__DIR__.'/../Resources/Views'));
    }
}
