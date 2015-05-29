<?php namespace Kumuwai\Playground\Http\Controllers;

use Kumuwai\Playground\Http\Requests;
use Kumuwai\Playground\Http\Controllers\Controller;

use Illuminate\Http\Request;


class UIController extends Controller 
{
	protected $project = 'base';

	public function __construct()
	{
		$projects = app()->make('projects.base');
		$project = $projects->get($this->project);

		view()->composer('layouts.main', function($view) use($project){
			$view->with(compact('project'));
		});
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view($this->project . '::index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view($this->project . '::create');
	}

}
