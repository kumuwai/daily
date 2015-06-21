<?php
use \AcceptanceTester;

class Project002Cest
{
    public function see_projects_in_reverse_order(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $text = $I->grabTextFrom('#project-menu');
        $I->seeRegularExpression('/Project 3.*Project 2/s', $text);
    }

    public function show_tools(AcceptanceTester $I)
    {
        $I->amOnPage('/tools/bootstrap');
        $I->seeResponseCodeIs(200);
        $I->seeLink('Bootstrap', 'http://getbootstrap.com');
        $I->seeLink('Project 2', '/project002');
    }

    public function make_sure_project002_page_exists(AcceptanceTester $I)
    {
        $I->amOnPage('/project002');
        $I->seeResponseCodeIs(200);
        $I->see('Project 2', 'h1');
    }

}
