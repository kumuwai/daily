<?php namespace Kumuwai\Playground\Http\Controllers;

use Kumuwai\Playground\Http\Requests;
use Kumuwai\Playground\Modules\Base\Domain\Tools;
use Kumuwai\Playground\Modules\Base\Domain\Projects;

class WelcomeController extends Controller 
{

    /*
    |--------------------------------------------------------------------------
    | Welcome Controller
    |--------------------------------------------------------------------------
    |
    | This controller renders the "marketing page" for the application and
    | is configured to only allow guests. Like most of the other sample
    | controllers, you are free to modify or remove it as you desire.
    |
    */

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application welcome screen to the user.
     *
     * @return Response
     */
    public function index(Projects $projectList, Tools $toolList)
    {
        $projects = $projectList->get()
            ->sortBy(function($project){
                return $project->name;
            }, SORT_REGULAR, true);
        $tools = $toolList->all();

        return view('index', compact('projects','tools'));
    }

}
