<?php 

class HelpersTest extends TestCase 
{
    public function testInsertJavascript()
    {
        Assets::shouldReceive('js')->with('foo', false)->andReturn('x');

        $this->assertEquals('x', js('foo'));
    }

    public function testInsertCss()
    {
        Assets::shouldReceive('css')->with('foo', false)->andReturn('x');

        $this->assertEquals('x', css('foo'));
    }

}

