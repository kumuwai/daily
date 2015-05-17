<?php namespace Kumuwai\Daily\Modules\Base\Domain;

use Caffeinated\Modules\Modules;
use Kumuwai\DataTransferObject\Laravel5DTO as DTO;
use Illuminate\Support\Collection;


class Days
{
    protected $modules;
    protected $tools;

    public function __construct(Modules $modules, Tools $tools)
    {
        $this->modules = $modules;
        $this->tools = $tools;
    }

    public function get($day = Null)
    {
        if ( ! $day )
            return $this->getDays();

        return $this->getDay($day);
    }

    private function getDays()
    {
        $modules = $this->modules->all()->filter(function($module) {
            return strpos($module['slug'], 'day') === 0
                && $module['enabled'];
        });

        $results = array();
        foreach ($modules as $module) {
            $results[] = $this->getModuleInformation($module);
        }

        return new Collection($results);
    }

    private function getDay($day)
    {
        $modules = $this->modules->all()->filter(function($module) use ($day) {
            return $module['slug'] == $day;
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
        $day = substr($slug, 3) + 0;

        if (is_numeric($day))
            return "Day $day";

        return $slug;
    }

}
