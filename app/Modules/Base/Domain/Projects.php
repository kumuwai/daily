<?php namespace Kumuwai\Playground\Modules\Base\Domain;

use Caffeinated\Modules\Modules;
use Kumuwai\DataTransferObject\Laravel5DTO as DTO;
use Illuminate\Support\Collection;


class Projects
{
    protected $modules;
    protected $tools;

    public function __construct(Modules $modules, Tools $tools)
    {
        $this->modules = $modules;
        $this->tools = $tools;
    }

    public function get($project = Null)
    {
        if ( ! $project )
            return $this->getProjects();

        return $this->getProject($project);
    }

    private function getProjects()
    {
        $modules = $this->modules->all()->filter(function($module) {
            return strpos($module['slug'], 'project') === 0
                && $module['enabled'];
        });

        $results = array();
        foreach ($modules as $module) {
            $results[] = $this->getModuleInformation($module);
        }

        return new Collection($results);
    }

    private function getProject($project)
    {
        $modules = $this->modules->all()->filter(function($module) use ($project) {
            return $module['slug'] == $project;
        });

        if ( ! $modules->count())
            return new DTO([]);

        return $this->getModuleInformation($modules->first());
    }

    /**
     * Returns module manifest information.
     *
     * @param  string $module
     * @return array
     */
    private function getModuleInformation($module)
    {
        return new DTO([
            'name'        => $module['name'],
            'slug'        => $module['slug'],
            'description' => $module['description'],
            'status'      => ($module['enabled']) ? 'Enabled' : 'Disabled',
            'tools'       => isset($module['tools']) ? $this->tools->mini($module['tools']) : '',
            'title'       => $this->getTitle($module['slug']),
        ]);
    }

    private function getTitle($slug)
    {
        $project = substr($slug, strlen('Project')) + 0;

        if (is_numeric($project))
            return "Project $project";

        return $slug;
    }

}
