<?php namespace Kumuwai\Playground\Modules\Project001\Http\Controllers;

use Kumuwai\Playground\Http\Requests;
use Kumuwai\Playground\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kumuwai\Playground\Modules\Base\Domain\Tools;
use Kumuwai\Playground\Modules\Base\Domain\Projects;

class Project001Controller extends Controller 
{
    /**
     * Information about individual projects / subprojects
     * in this project. 
     * Includes name, slug, description, status, and tools used
     */
    private $projects;

    /**
     * Information about the tools used in the project
     * (eg, Laravel, AngularJS, etc.)
     * Reads data from config/tools.php
     */
    private $tools;

    /**
     * Constructor
     * 
     * @param Projects  $projects  
     * @param Tools $tools 
     */
    public function __construct(Projects $projects, Tools $tools)
    {
        $this->projects = $projects;
        $this->tools = $tools;
    }

    /**
     * Return a view showing an index of projects and tools used
     */
    public function index()
    {
        $projects = $this->projects->get()
            ->sortBy(function($project){
                return $project->name;
            }, SORT_REGULAR, true);
        $tools = $this->tools->all();

        return view('project001::project001', compact('projects','tools'));
    }

}
