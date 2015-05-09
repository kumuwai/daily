<?php namespace Kumuwai\Daily\Modules\Day001\Domain;

use Caffeinated\Modules\Modules;
use Kumuwai\DataTransferObject\DTO;


class Days
{
    protected $modules;
    protected $tools;

    public function __construct(Modules $modules, Tools $tools)
    {
        $this->modules = $modules;
        $this->tools = $tools;
    }

    public function get()
    {
        return $this->getDays();
    }

    private function getDays()
    {
        $modules = array_filter($this->modules->all()->toArray(), function($module){
            return strpos($module['name'], 'Day') === 0
                && $module['enabled'];
        });

        $results = array();
        foreach ($modules as $module) {
            $results[] = $this->getModuleInformation($module);
        }

        return new DTO($results);
    }

    /**
     * Returns module manifest information.
     *
     * @param  string $module
     * @return array
     */
    private function getModuleInformation($module)
    {
        return [
            'name'        => $module['name'],
            'slug'        => $module['slug'],
            'description' => $module['description'],
            'status'      => ($module['enabled']) ? 'Enabled' : 'Disabled',
            'tools'       => isset($module['tools']) ? $this->tools->mini($module['tools']) : '',
        ];
    }

}
