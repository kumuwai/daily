<?php
namespace Kumuwai\Daily\Modules\Day001\Providers;

use App;
use Config;
use Lang;
use View;
use Illuminate\Support\ServiceProvider;

class Day001ServiceProvider extends ServiceProvider
{
	/**
	 * Register the Day001 module service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		// This service provider is a convenient place to register your modules
		// services in the IoC container. If you wish, you may make additional
		// methods or service providers to keep the code more focused and granular.
		App::register('Kumuwai\Daily\Modules\Day001\Providers\RouteServiceProvider');

		$this->registerNamespaces();
	}

	/**
	 * Register the Day001 module resource namespaces.
	 *
	 * @return void
	 */
	protected function registerNamespaces()
	{
		Lang::addNamespace('day001', realpath(__DIR__.'/../Resources/Lang'));

		View::addNamespace('day001', realpath(__DIR__.'/../Resources/Views'));
	}
}
