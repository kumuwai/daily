<?php namespace Kumuwai\Playground\Modules\Base\Http\Controllers;

use Kumuwai\Playground\Http\Controllers\UIController;
use Kumuwai\Playground\Modules\Base\Domain\Tools;
use Kumuwai\Playground\Modules\Base\Domain\Projects;

class ToolsController extends UIController 
{
    protected $tools;
    protected $projects;

    public function __construct(Tools $tools, Projects $projects)
    {
        parent::__construct();
        
        $this->tools = $tools;
        $this->projects = $projects;
    }

    public function show($id)
    {
        $tool = $this->tools->get([$id]);
        $projects = $this->projects->getProjectsWithTool($id);

        return view('base::show-tool', compact('id','tool','projects'));
    }

}
