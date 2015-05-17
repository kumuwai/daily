<?php namespace Kumuwai\Daily\Modules\Day001\tests\codeception\acceptance;

use AcceptanceTester;

class Day001Cest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function _after(AcceptanceTester $I)
    {
    }

    public function make_sure_index_page_works(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->dontSee('failed to open stream: Permission denied');
        $I->dontSee('Whoops');
        $I->seeResponseCodeIs(200);
        $I->see('Aloha', 'h1');
    }

    public function make_sure_index_page_has_list_of_tools(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->seeImageWithSource('/img/logos/logo_laravel.png');
        $I->seeLink('Laravel');
        $I->seeImageWithSource('/img/logos/logo_codeception.png');
        $I->seeLink('codeception');
    }

    public function make_sure_index_page_has_list_of_days(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->seeLink('Day001');
    }

}
