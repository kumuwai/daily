<?php

class Day002Test extends TestCase 
{

    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testCanOpenHomePage()
    {
        $response = $this->call('GET', '/day002');

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertContains('Day 2', $response->getContent());
    }

}
