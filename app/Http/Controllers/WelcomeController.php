<?php namespace Kumuwai\Playground\Http\Controllers;

use Kumuwai\Playground\Modules\Base\Domain\Tools;
use Kumuwai\Playground\Modules\Base\Domain\Projects;


class WelcomeController extends UIController 
{

    /**
     * Show the application welcome screen to the user.
     *
     * @return Response
     */
    public function index(Projects $projectList=null, Tools $toolList=null)
    {
        $projects = $projectList->get()
            ->sortBy(function($project){
                return $project->name;
            }, SORT_REGULAR, true);
        $tools = $toolList->all();

        return view('index', compact('projects','tools'));
    }

    public function history()
    {
        return view('history');
    }

}
