<?php namespace Kumuwai\Daily\Modules\Base\Providers;

use App;
use Config;
use Lang;
use View;
use Illuminate\Support\ServiceProvider;

use Kumuwai\Daily\Modules\Base\Domain\Days;
use Kumuwai\Daily\Modules\Base\Domain\Tools;


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
		App::register('Kumuwai\Daily\Modules\Base\Providers\RouteServiceProvider');

		$this->app->bind('days.base', function($app){
			return new Days($app['modules'], new Tools);
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
