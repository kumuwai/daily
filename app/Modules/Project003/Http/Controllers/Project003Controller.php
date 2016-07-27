<?php namespace Kumuwai\Playground\Modules\Project003\Http\Controllers;

use Kumuwai\Playground\Http\Requests;
use Kumuwai\Playground\Http\Controllers\UIController;
use Illuminate\Http\Request;


class Project003Controller extends UIController 
{
    protected $project = 'project003';

    protected $pages = [
            '1' => '2-way binding between data and input',
            '2' => 'Lists',
            '3' => 'Event handling',
            '4' => 'Sorting and filtering',
            '5' => 'Basic Component (counters)',
            '6' => 'Price List Component',
            '7' => 'Task Component',
            '8' => 'AJAX Tasks (using Laravel data)',
            '9' => 'Alert boxes',
            // '5' => 'Basic forms with Laravel',
        ];

    public function index()
    {
        $pages = $this->pages;
        
        return view('project003::index', compact('pages'));
    }

    public function show($page)
    {
        return view("project003::$page");
    }

}
