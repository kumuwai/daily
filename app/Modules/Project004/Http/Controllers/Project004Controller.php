<?php namespace Kumuwai\Playground\Modules\Project004\Http\Controllers;

use Kumuwai\Playground\Http\Requests;
use Kumuwai\Playground\Http\Controllers\UIController;
use Illuminate\Http\Request;


class Project004Controller extends UIController 
{
    protected $project = 'project004';

    protected $pages = [
            '1' => 'Flexboxes',
        ];

    public function index()
    {
        $pages = $this->pages;
        
        return view("{$this->project}::index", compact('pages'));
    }

    public function show($page)
    {
        return view("{$this->project}::$page");
    }

}
