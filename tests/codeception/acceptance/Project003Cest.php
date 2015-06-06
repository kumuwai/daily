<?php

use \AcceptanceTester;

class Project003Cest
{

    public function make_sure_project003_page_exists(AcceptanceTester $I)
    {
        $I->amOnPage('/project003');
        $I->seeResponseCodeIs(200);
        $I->see('Project 3', 'h1');
    }

    public function make_sure_project003_page1_exists(AcceptanceTester $I)
    {
        $I->amOnPage('/project003/p1');
        $I->seeResponseCodeIs(200);
        $I->see('Project 3', 'h1');
    }

}
