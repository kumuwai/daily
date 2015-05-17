<?php namespace Kumuwai\Daily\Http\Controllers;

use Kumuwai\Daily\Http\Requests;
use Kumuwai\Daily\Http\Controllers\Controller;

use Illuminate\Http\Request;


class UIController extends Controller 
{
	protected $day = 'base';

	public function __construct()
	{
		$days = app()->make('days.base');
		$day = $days->get($this->day);

		view()->composer('layouts.main', function($view) use($day){
			$view->with(compact('day'));
		});
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view($this->day . '::index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view($this->day . '::create');
	}

}
