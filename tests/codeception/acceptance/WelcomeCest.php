<?php
use \AcceptanceTester;

class WelcomeCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function _after(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
        $I->wantTo('make sure the index page works');
        $I->amOnPage('/');
        $I->see('Welcome');
    }

}