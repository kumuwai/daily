<?php namespace Kumuwai\Daily\Modules\Day001\Domain;


class Tools
{
    public function get(array $tools = [])
    {
        if (count($tools))
            return array_only(config('tools'), $tools);

        return config('tools');
    }

    public function all()
    {
        return $this->render();
    }

    public function render(array $tools = [])
    {
        return $this->renderView('day001::image', $this->get($tools));
    }

    public function mini(array $tools)
    {
        return $this->renderView('day001::mini', $this->get($tools));
    }

    private function renderView($view, $items)
    {
        $result = '';
        foreach($items as $item) {
            $result .= view($view, $item)->render();
        }
        return $result;
    }

}
