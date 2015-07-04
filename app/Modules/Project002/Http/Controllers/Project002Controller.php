<?php namespace Kumuwai\Playground\Modules\Project002\Http\Controllers;

use Kumuwai\Playground\Http\Requests;
use Kumuwai\Playground\Http\Controllers\UIController;
use Illuminate\Http\Request;


class Project002Controller extends UIController 
{
    protected $project = 'project002';

    public function index()
    {
        $projects = app()->make('projects.base')->get();
        
        return view('project002::index')
            ->with(compact('projects'));
    }

}
