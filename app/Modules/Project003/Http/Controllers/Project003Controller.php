<?php namespace Kumuwai\Playground\Modules\Project003\Http\Controllers;

use Kumuwai\Playground\Http\Requests;
use Kumuwai\Playground\Http\Controllers\UIController;
use Illuminate\Http\Request;


class Project003Controller extends UIController 
{
    protected $project = 'project003';

    public function index()
    {
        $pages = [
            '1' => '2-way binding between data and input',
            '2' => 'Lists',
            '3' => 'Event handling',
        ];

        return view('project003::index', compact('pages'));
    }

    public function show($page)
    {
        return view("project003::$page");
    }

}
