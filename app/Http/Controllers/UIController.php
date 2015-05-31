<?php namespace Kumuwai\Playground\Http\Controllers;

use Kumuwai\Playground\Http\Controllers\Controller;


class UIController extends Controller 
{
    protected $project = 'base';

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $projects = app()->make('projects.base');
        $project = $projects->get($this->project);

        view()->composer('layouts.main', function($view) use($project){
            $view->with(compact('project'));
        });

        view()->composer('base::navbar', function($view) use($projects){
            $view->with('projects', $projects->get());
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
