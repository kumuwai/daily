<?php

use Symfony\Component\DomCrawler\Crawler;

class Project001Test extends TestCase 
{

    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testCanOpenHomePage()
    {
        $response = $this->call('GET', '/');

        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testCanOpenPageForProject()
    {
        $response = $this->call('GET', '/project001');

        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testProjectListAppearsInReverseOrder()
    {
        $crawler = new Crawler($this->call('GET','/')->getContent());
        $text = $crawler->filter('#main-menu')->text();
        $this->assertRegExp('/Project 2.*Project 1/s', $text);
    }

}
