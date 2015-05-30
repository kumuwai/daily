<?php
namespace Codeception\Module;

// here you can define custom actions
// all public methods declared in helper class will be available in $I

class AcceptanceHelper extends \Codeception\Module
{
    public function seeImageWithSource($image_url)
    {
        $phpBrowser = $this->getModule('PhpBrowser');
        $phpBrowser->seeElement('//img[@src="'.$image_url.'"]');
    }

    public function seeRegularExpression($pattern, $value)
    {
        \PHPUnit_Framework_Assert::assertRegExp($pattern, $value);
    }

}
