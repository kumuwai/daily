<?php
namespace Kumuwai\Playground\Modules\Project004\Providers;

use App;
use Config;
use Lang;
use View;
use Illuminate\Support\ServiceProvider;

class Project004ServiceProvider extends ServiceProvider
{
	/**
	 * Register the Project004 module service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		// This service provider is a convenient place to register your modules
		// services in the IoC container. If you wish, you may make additional
		// methods or service providers to keep the code more focused and granular.
		App::register('Kumuwai\Playground\Modules\Project004\Providers\RouteServiceProvider');

		$this->registerNamespaces();
	}

	/**
	 * Register the Project004 module resource namespaces.
	 *
	 * @return void
	 */
	protected function registerNamespaces()
	{
		Lang::addNamespace('project004', realpath(__DIR__.'/../Resources/Lang'));
		
		View::addNamespace('project004', base_path('resources/views/vendor/project004'));
		View::addNamespace('project004', realpath(__DIR__.'/../Resources/Views'));
	}
}
