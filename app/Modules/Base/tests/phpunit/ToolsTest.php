<?php namespace Kumuwai\Playground\Modules\Base\Domain;

include_once 'functions.php';
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
            [['laravel'],'<base::tool.Laravel 5>'],
            [['laravel','na'],'<base::tool.Laravel 5>'],
            [[],'<base::tool.Laravel 5><base::tool.tool1>'],
        );
    }

    public function testCanGetAllRenderedTools()
    {
        $test = new Tools;
        $result = $test->all();
        $this->assertSame('<base::tool.Laravel 5><base::tool.tool1>', $result);
    }

    public function testCanGetMiniRenderedTools()
    {
        $test = new Tools;
        $result = $test->mini(['laravel']);
        $this->assertSame('<base::mini-tool.Laravel 5>', $result);
    }

}


