<?php namespace Kumuwai\Playground\Modules\Base\Domain;


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
        return $this->renderView('base::tool', $this->get($tools));
    }

    public function mini(array $tools)
    {
        return $this->renderView('base::mini-tool', $this->get($tools));
    }

    private function renderView($view, $items)
    {
        $result = '';
        foreach($items as $key=>$item) {
            $item['key'] = $key;
            $result .= view($view, $item)->render();
        }
        return $result;
    }

}
