<?php

class Project001Cest
{
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

    public function make_sure_index_page_has_list_of_projects(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->seeLink('Project 1','project001');
    }

    public function make_sure_project1_page_works(AcceptanceTester $I)
    {
        $I->amOnPage('/project001');
        $I->seeResponseCodeIs(200);
        $I->see('Aloha', 'h1');
        $I->seeLink('Project 1','project001');
    }

}
