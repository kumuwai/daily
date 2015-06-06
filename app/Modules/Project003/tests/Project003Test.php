<?php

class Project003Test extends TestCase
{
    public function testCanOpenIndexPageForProject003()
    {
        $response = $this->call('GET', '/project003');

        $this->assertEquals(200, $response->getStatusCode());
    }

}
