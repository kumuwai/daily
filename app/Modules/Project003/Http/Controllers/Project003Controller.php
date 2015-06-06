<?php namespace Kumuwai\Playground\Modules\Project003\Http\Controllers;

use Kumuwai\Playground\Http\Requests;
use Kumuwai\Playground\Http\Controllers\UIController;
use Illuminate\Http\Request;


class Project003Controller extends UIController 
{
    protected $project = 'project003';

    public function index()
    {
        return view('project003::index');
    }

    public function show($page)
    {
        return view("project003::$page");
    }

}
