<?php namespace Kumuwai\Playground\Modules\Base\Domain;

/**
 * This view stub is used by ToolTest 
 * to make sure we are loading the correct view
 */
class TestViewStub 
{
    private $view;
    private $item;

    public function __construct($view, $item)
    {
        $this->item = $item;
        $this->view = $view;
    }

    public function render()
    {
        return '<' . $this->view . '.' . $this->item['caption'] . '>';
    }
}
