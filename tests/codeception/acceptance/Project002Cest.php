<?php
use \AcceptanceTester;

class Project002Cest
{
    public function see_projects_in_reverse_order(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $text = $I->grabTextFrom('#project-menu');
        $I->seeRegularExpression('/Project 2.*Project 1/s', $text);
    }

    public function show_tools(AcceptanceTester $I)
    {
        $I->amOnPage('/tools/laravel');
        $I->seeResponseCodeIs(200);
        $I->seeLink('Laravel', 'http://laravel.com');
        $I->seeLink('Project 1', '/project001');
    }

    public function make_sure_project002_page_exists(AcceptanceTester $I)
    {
        $I->amOnPage('/project002');
        $I->seeResponseCodeIs(200);
        $I->see('Project 2', 'h1');
    }

}
