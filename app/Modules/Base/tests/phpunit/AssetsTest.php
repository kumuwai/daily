<?php namespace Kumuwai\Playground\Modules\Base\Domain;

include_once 'functions.php';
use PHPUnit_Framework_TestCase;


class AssetsTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->test = new Assets;
    }

    public function testCss()
    {
        $this->assertEquals(
            '<link href="http://site.com/css/foo.css" type="text/css" rel="stylesheet" />',
            $this->test->css('foo')
        );
    }

    public function testJavascript()
    {
        $this->assertEquals(
            '<script type="text/javascript" src="http://site.com/js/foo.js"></script>',
            $this->test->js('foo')
        );
    }

    public function testCssArray()
    {
        $this->assertEquals(
            '<link href="http://site.com/css/foo.css" type="text/css" rel="stylesheet" />'.
            '<link href="http://site.com/css/bar.css" type="text/css" rel="stylesheet" />',
            $this->test->css('bar')            
        );
    }
}


