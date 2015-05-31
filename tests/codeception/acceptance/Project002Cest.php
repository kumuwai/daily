<?php
use \AcceptanceTester;

class Project002Cest
{
    public function see_projects_in_reverse_order(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $text = $I->grabTextFrom('#main-menu');
        $I->seeRegularExpression('/Project 2.*Project 1/s', $text);
    }

    public function make_sure_project002_page_exists(AcceptanceTester $I)
    {
        $I->amOnPage('/project002');
        $I->seeResponseCodeIs(200);
        $I->see('Project 2', 'h1');
    }

}
