<?php
namespace Kumuwai\Daily\Modules\Day002\Providers;

use App;
use Config;
use Lang;
use View;
use Illuminate\Support\ServiceProvider;

class Day002ServiceProvider extends ServiceProvider
{
	/**
	 * Register the Day002 module service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		// This service provider is a convenient place to register your modules
		// services in the IoC container. If you wish, you may make additional
		// methods or service providers to keep the code more focused and granular.
		App::register('Kumuwai\Daily\Modules\Day002\Providers\RouteServiceProvider');

		$this->registerNamespaces();
	}

	/**
	 * Register the Day002 module resource namespaces.
	 *
	 * @return void
	 */
	protected function registerNamespaces()
	{
		Lang::addNamespace('day002', realpath(__DIR__.'/../Resources/Lang'));

		View::addNamespace('day002', realpath(__DIR__.'/../Resources/Views'));
	}
}
