<?php
namespace Kumuwai\Playground\Modules\Project002\Providers;

use App;
use Config;
use Lang;
use View;
use Illuminate\Support\ServiceProvider;

class Project002ServiceProvider extends ServiceProvider
{
	/**
	 * Register the Project002 module service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		// This service provider is a convenient place to register your modules
		// services in the IoC container. If you wish, you may make additional
		// methods or service providers to keep the code more focused and granular.
		App::register('Kumuwai\Playground\Modules\Project002\Providers\RouteServiceProvider');

		$this->registerNamespaces();
	}

	/**
	 * Register the Project002 module resource namespaces.
	 *
	 * @return void
	 */
	protected function registerNamespaces()
	{
		Lang::addNamespace('project002', realpath(__DIR__.'/../Resources/Lang'));

		View::addNamespace('project002', realpath(__DIR__.'/../Resources/Views'));
	}
}
