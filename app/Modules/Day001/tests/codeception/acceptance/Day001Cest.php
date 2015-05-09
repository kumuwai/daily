<?php namespace Kumuwai\Daily\Modules\Day001\tests\codeception\acceptance;
use \AcceptanceTester;

class Day001Cest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function _after(AcceptanceTester $I)
    {
    }

    public function tryToTest(AcceptanceTester $I)
    {
        $I->wantTo('make sure the index page works');
        $I->amOnPage('/');
        $I->dontSee('failed to open stream: Permission denied');
        $I->dontSee('Whoops');
        $I->seeResponseCodeIs(200);
        $I->see('Aloha', 'h1');
    }

}