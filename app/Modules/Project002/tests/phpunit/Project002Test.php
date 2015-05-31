<?php

class Project002Test extends TestCase
{
    public function testCanOpenIndexPageForProject2()
    {
        $response = $this->call('GET', '/project002');

        $this->assertEquals(200, $response->getStatusCode());
    }
}