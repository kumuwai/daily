<?php

class Day001Test extends TestCase 
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

    public function testCanOpenPageForDay()
    {
        $response = $this->call('GET', '/day001');

        $this->assertEquals(200, $response->getStatusCode());
    }

}
