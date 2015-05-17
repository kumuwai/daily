<?php namespace Kumuwai\Daily\Modules\Base\Domain;

use PHPUnit_Framework_TestCase;


class ToolsTest extends PHPUnit_Framework_TestCase
{
    public function testExists()
    {
        $test = new Tools;
    }

    /**
     * @dataProvider getListOfTools
     */
    public function testCanGetArrayOfTools($keys, $expected)
    {
        $test = new Tools;
        $result = $test->get($keys);
        $this->assertEquals($expected, $result);
    }

    public function getListOfTools()
    {
        return array(
            [['na'], []],
            [[], config('tools')],
            [['tool1'], array_only(config('tools'),['tool1'])],
            [['tool1','na'], array_only(config('tools'),['tool1'])],
        );
    }

    /**
     * @dataProvider getRenderedTools
     */
    public function testCanGetRenderedTools($keys, $expected)
    {
        $test = new Tools;
        $result = $test->render($keys);
        $this->assertEquals($expected, $result);
    }

    public function getRenderedTools()
    {
        return array(
            [['na'],''],
            [['laravel'],'<base::image.Laravel 5>'],
            [['laravel','na'],'<base::image.Laravel 5>'],
            [[],'<base::image.Laravel 5><base::image.tool1>'],
        );
    }

    public function testCanGetAllRenderedTools()
    {
        $test = new Tools;
        $result = $test->all();
        $this->assertSame('<base::image.Laravel 5><base::image.tool1>', $result);
    }

    public function testCanGetMiniRenderedTools()
    {
        $test = new Tools;
        $result = $test->mini(['laravel']);
        $this->assertSame('<base::mini.Laravel 5>', $result);
    }

}

function config($what) 
{
    return [
        'laravel' => ['caption'=>'Laravel 5', 'url'=>'http://laravel.com', 'file'=>'logo_laravel.png'],
        'tool1' => ['caption'=>'tool1','url'=>'#', 'file'=>'tool1.png'],
    ];
}

function array_only($array, $keys)
{
    return array_intersect_key($array, array_flip((array) $keys));
}

function view($name, $with)
{
    return new TestViewStub($name, $with);
}

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
