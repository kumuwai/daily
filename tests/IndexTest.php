<?php

use Symfony\Component\DomCrawler\Crawler;

class IndexTest extends TestCase 
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

    public function testProjectListAppearsInReverseOrder()
    {
        $crawler = new Crawler($this->call('GET','/')->getContent());
        $text = $crawler->filter('#project-menu')->text();
        $this->assertRegExp('/Project 3.*Project 2/s', $text);
    }

}
