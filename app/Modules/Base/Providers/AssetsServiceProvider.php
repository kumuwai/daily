<?php namespace Kumuwai\Playground\Modules\Base\Providers;

use Illuminate\Support\ServiceProvider;
use Kumuwai\Playground\Modules\Base\Domain\Assets;

class AssetsServiceProvider extends ServiceProvider 
{
    protected $defer = false;    // only load if/when needed

    public function register()
    {
        $this->app['assets'] = $this->app->share(function($app){
            return new Assets();
        });
    }
    public function provides()
    {
        return array('Assets');
    }
}
